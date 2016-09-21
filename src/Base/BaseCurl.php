<?php
/**
 * creator: maigohuang
 */ 
namespace Ksyun\Base;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\UriInterface;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class BaseCurl extends Singleton
{
    const DEFAULT_TIMEOUT = 5;
    protected $apiList = [];

    protected $client = null;
    protected $stack = null;

    protected function __construct()
    {
        $this->stack = HandlerStack::create();
        $this->stack->push($this->replaceUri());

        $config = $this->getConfig();
        $this->client = new Client([
            'handler' => $this->stack,
            'base_uri' => $config['host'],
        ]);
    }

    abstract protected function getConfig();

    public function request($api, array $config = [])
    {
        $config_api = isset($this->apiList[$api]) ? $this->apiList[$api] : false;

        $defaultConfig = $this->getConfig();
        $config = $this->configMerge($defaultConfig['config'], $config_api['config'], $config);
        $info = array_merge($defaultConfig, $config_api);
        $info['config'] = $config;
        //$this->replace($info);

        $method = $info['method'];
        try {
            $response = $this->client->request($method, $info['url'], $info['config']);
            return $response;
        }catch(ClientException $exception) {
            return $exception->getResponse();
        }
    }

    private function configMerge($c1, $c2, $c3)
    {
        $result = $c1;
        foreach ($c2 as $k=>$v) {
            if (isset($result[$k]) && is_array($result[$k]) && is_array($v)) {
                $result[$k] = array_merge($result[$k], $v);
            }else {
                $result[$k] = $v;
            }
        }

        foreach ($c3 as $k=>$v) {
            if (isset($result[$k]) && is_array($result[$k]) && is_array($v)) {
                $result[$k] = array_merge($result[$k], $v);
            }else {
                $result[$k] = $v;
            }
        }
        return $result;
    }

    protected function replaceUri()
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                if (isset($options['replace'])) {
                    $replace = $options['replace'];
                    $uri = (string)$request->getUri();

                    $func = function($matches) use($replace) {
                        $key = substr($matches[0], 1, -1);
                        return $replace[$key];
                    };
                    $uri = preg_replace_callback('/\{.*?\}/', $func, $uri);

                    $func2 = function($matches) use($replace) {
                        $key = substr($matches[0], 3, -3);
                        return $replace[$key];
                    };
                    $uri = preg_replace_callback('/%7B.*?%7D/', $func2, $uri);
                    $request = $request->withUri(new Uri($uri));
                }
                return $handler($request, $options);
            };
        };
    }

    private function replace(&$options)
    {
        if (isset($options['config']['replace']) && is_array($options['config']['replace'])) {
            $url = $options['url'];
            $params = $options['config']['replace'];
            $url = preg_replace_callback('({[0-9a-zA-Z-_]+})', function($matched) use($params) {
                $key = substr($matched[0], 1, strlen($matched[0]) - 2);
                if (isset($params[$key])) {
                    $ret = $params[$key];
                    unset($params[$key]);
                    return $ret;
                }else {
                    return '';
                }
            }, $url);
            $options['url'] = $url;
        }
    }
}
