<?php
/**
 * @desc 离线转码
 * @author wangshuai<wangshuai9@kingsoft.com>
 * @date 2017/01/22
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Kvs extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'http://kvs.cn-beijing-6.api.ksyun.com',
            'timeout' => 5,
            'config' => [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'kvs',
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
        'Preset' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'Preset',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'UpdatePreset' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'UpdatePreset',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'DelPreset' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DelPreset',
                    'Version' => '2017-01-01',
                ]
            ],
        ],
        'GetPresetList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPresetList',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'GetPresetDetail' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPresetDetail',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'CreateTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateTask',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'DelTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DelTaskByTaskID',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'TopTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'TopTaskByTaskID',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'GetTaskList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskList',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'GetTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskByTaskID',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'GetTaskMetaInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskMetaInfo',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'BatchCreateTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'BatchCreateTask',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
    ];
}
