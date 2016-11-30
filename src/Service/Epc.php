<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Epc extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'https://epc.{region}.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'epc',
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
        'StartEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'StartEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ListEpcs' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListEpcs',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'UpdateEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UpdateEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'GetEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'CreateEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'RebootEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'RebootEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'PoweroffEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'PoweroffEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ReinstallEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ReinstallEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DeleteEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'GetEpcImage' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetEpcImage',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'MonitorEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'MonitorEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'SwitchSubnet' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'SwitchSubnet',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
    ];
}
