<?php
/**
 * creator: maigohuang
 */ 
namespace Ksyun\Base;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class V4Curl extends BaseCurl 
{
    protected function __construct()
    {
        $this->stack = HandlerStack::create();
        $this->stack->push($this->replaceUri());
        $this->stack->push($this->v4Sign());

        $config = $this->getConfig();
        $this->client = new Client([
            'handler' => $this->stack,
            'base_uri' => $config['host'],
        ]);
    }

    protected function v4Sign()
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $v4 = new SignatureV4();
                $credentials = $options['v4_credentials'];
                if (!isset($credentials['ak']) || !isset($credentials['sk'])) {
                    $json = json_decode(file_get_contents(getenv('HOME') . '/.ksyun/config'), true);
                    if (is_array($json) && isset($json['ak']) && isset($json['sk'])) {
                        $credentials = array_merge($credentials, $json);
                    }
                }
                $request = $v4->signRequest($request, $credentials);
                return $handler($request, $options);
            };
        };
    }
}
