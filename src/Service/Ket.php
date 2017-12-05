<?php
/**
 * @desc 直播转码
 * @author wangshuai<wangshuai9@kingsoft.com>
 * @date 2016/12/12
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Ket extends V4Curl
{
    const VERSION = '2017-01-01';
    protected function getConfig()
    {
        return [
            'host' => 'http://ket.cn-beijing-6.api.ksyun.com',
            'timeout' => 5,
            'config' => [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'ket',
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
        'GetStreamTranList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetStreamTranList',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'StartStreamPull' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StartStreamPull',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'StopStreamPull' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StopStreamPull',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetQuotaUsed' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetQuotaUsed',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'StartLoop' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StartLoop',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'StopLoop' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StopLoop',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'UpdateLoop' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'UpdateLoop',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetLoopList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetLoopList',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'CreateDirectorTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateDirectorTask',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'UpdateDirectorTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'UpdateDirectorTask',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'QueryDirectorTask' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'QueryDirectorTask',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'DelDirectorTask' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DelDirectorTask',
                    'Version' => self::VERSION
                ]
            ],
        ],
        'GetLiveTransDuration' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetLiveTransDuration',
                    'Version' => self::VERSION
                ]
            ],
        ],
    ];
}
