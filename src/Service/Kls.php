<?php
/**
 * @desc 直播服务
 * @author yangfan<yangfan16@kingsoft.com>
 * @date 2017/04/11
 */

namespace Ksyun\Service;

use Ksyun\Base\V4Curl;


class Kls extends V4Curl
{
	
	protected function getConfig()
	{
		return [
            'host' => 'http://kls.cn-beijing-6.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'kls',
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
        'CreateRecordTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateRecordTask',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'CancelRecordTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CancelRecordTask',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'GetRecordTask' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetRecordTask',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'ListHistoryRecordTasks' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListHistoryRecordTasks',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'StartStreamRecord' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'StartStreamRecord',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'StopStreamRecord' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StopStreamRecord',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
    ];
}

