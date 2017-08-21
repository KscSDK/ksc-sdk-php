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
    const VERSION = '2017-01-01';
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
                    'Version' => self::VERSION
                ]
            ],
        ],
        'UpdatePreset' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'UpdatePreset',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'DelPreset' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DelPreset',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetPresetList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPresetList',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetPresetDetail' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPresetDetail',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'CreateTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateTask',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'CreateFlowTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateFlowTask',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'DelTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DelTaskByTaskID',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'TopTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'TopTaskByTaskID',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetTaskList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskList',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetTaskByTaskID' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskByTaskID',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetTaskMetaInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetTaskMetaInfo',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'BatchCreateTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'BatchCreateTask',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'UpdatePipeline' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'UpdatePipeline',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'QueryPipeline' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'QueryPipeline',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetMediaTransDuration' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetMediaTransDuration',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetScreenshotNumber' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetScreenshotNumber',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetInterfaceNumber' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetInterfaceNumber',
                    'Version' => self::VERSION
                ]
            ],
        ],
    ];
}
