<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Slb extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'https://slb.{region}.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'slb',
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
        'CreateLoadBalancer' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateLoadBalancer',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteLoadBalancer' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteLoadBalancer',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyLoadBalancer' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyLoadBalancer',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeLoadBalancers' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeLoadBalancers',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateListeners' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateListeners',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyListeners' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyListeners',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteListeners' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteListeners',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeListeners' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeListeners',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ConfigureHealthCheck' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ConfigureHealthCheck',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyHealthCheck' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyHealthCheck',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteHealthCheck' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteHealthCheck',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeHealthChecks' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeHealthChecks',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'RegisterInstancesWithListener' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'RegisterInstancesWithListener',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyInstancesWithListener' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyInstancesWithListener',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeregisterInstancesFromListener' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeregisterInstancesFromListener',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeInstancesWithListener' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeInstancesWithListener',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
    ];
}
