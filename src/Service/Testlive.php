<?php
/**
 * @desc 直播
 * @author jinlei1<jinlei1@kingsoft.com>
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Testlive extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'http://testlive.cn-beijing-6.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'testlive',
                ],
            ],
        ];
    }

    public function request($api, array $config = [], $region = 'cn-beijing-6')
    {
        $config['v4_credentials']['region'] = $region;
        $config['replace']['region'] = $region;
        return parent::request($api, $config);
    }

    protected $apiList = [
        'listPubStreamsInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'listPubStreamsInfo',
                    'Version' => '2016-09-25'
                ]
            ],
        ],
        'listPubErrInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'listPubErrInfo',
                    'Version' => '2016-09-25'
                ]
            ],
        ],
        'listRelayErrInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'listRelayErrInfo',
                    'Version' => '2016-09-25',
                ]
            ],
        ],
        'listRelayStreamsInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'listRelayStreamsInfo',
                    'Version' => '2016-09-25'
                ]
            ],
        ],
    ];
}
