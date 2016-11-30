<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Kec extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'https://kec.{region}.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'kec',
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
        'RunInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'RunInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'TerminateInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'TerminateInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'StartInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'StartInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'StopInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'StopInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'RebootInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'RebootInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'MonitorInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'MonitorInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'UnmonitorInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UnmonitorInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyInstanceType' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyInstanceType',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyInstanceImage' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyInstanceImage',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyInstanceAttribute' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyInstanceAttribute',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeInstances' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeInstances',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyNetworkInterfaceAttribute' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyNetworkInterfaceAttribute',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateImage' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateImage',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeImages' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeImages',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'RemoveImage' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'RemoveImage',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyImageAttribute' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyImageAttribute',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
    ];
}
