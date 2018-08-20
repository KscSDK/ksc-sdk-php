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
            'host' => 'https://epc.api.ksyun.com',
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
        'ModifyEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ModifyHyperThreading' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyHyperThreading',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ResetPassword' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ResetPassword',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeEpcs' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeEpcs',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
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
        'StopEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'StopEpc',
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
        'ReinstallCustomerEpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ReinstallCustomerEpc',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'CreateImage' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateImage',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ModifyImage' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyImage',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DeleteImage' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteImage',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeImages' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeImages',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ModifyNetworkInterfaceAttribute' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyNetworkInterfaceAttribute',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ModifyDns' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyDns',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ModifySecurityGroup' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifySecurityGroup',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ImportKey' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ImportKey',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DeleteKey' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteKey',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ModifyKey' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyKey',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'CreateKey' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateKey',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeKeys' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeKeys',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribePhysicalMonitor' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribePhysicalMonitor',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeCabinets' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeCabinets',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'CreateRemoteManagement' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateRemoteManagement',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'ModifyRemoteManagement' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyRemoteManagement',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DeleteRemoteManagement' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteRemoteManagement',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'GetDynamicCode' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetDynamicCode',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeRemoteManagements' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeRemoteManagements',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeEpcManagements' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeEpcManagements',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeVpns' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeVpns',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
        'DescribeCertificates' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeCertificates',
                    'Version' => '2015-11-01'
                ]
            ],
        ],
    ];
}
