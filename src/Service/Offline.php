<?php
/**
 * @desc 离线转码
 * @author wangshuai<wangshuai9@kingsoft.com>
 * @date 2016/09/19
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Offline extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'http://offline.cn-beijing-6.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'offline',
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
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'UpdatePreset' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'UpdatePreset',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'DelPreset' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DelPreset',
                    'Version' => '2016-09-19',
                ]
            ],
        ],
        'GetPresetList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPresetList',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'GetPresetDetail' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPresetDetail',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'CreateTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateTask',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'DelTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DelTaskByTaskID',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'TopTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'TopTaskByTaskID',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'GetTaskList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskList',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'GetTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskByTaskID',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
        'GetTaskMetaInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskMetaInfo',
                    'Version' => '2016-09-19'
                ]
            ],
        ],
    ];
}
