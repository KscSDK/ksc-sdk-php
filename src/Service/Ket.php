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
        'GetStreamTranList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetStreamTranList',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'StartStreamPull' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StartStreamPull',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'StopStreamPull' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StopStreamPull',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'GetQuotaUsed' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetQuotaUsed',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'StartLoop' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StartLoop',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'StopLoop' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StopLoop',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'UpdateLoop' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'UpdateLoop',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
        'GetLoopList' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetLoopList',
                    'Version' => '2017-01-01'
                ]
            ],
        ],
    ];
}
