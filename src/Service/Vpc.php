<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Vpc extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'https://vpc.{region}.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'vpc',
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
        'DescribeNetworkInterfaces' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeNetworkInterfaces',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateVpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateVpc',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteVpc' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteVpc',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeVpcs' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeVpcs',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateSubnet' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateSubnet',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteSubnet' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteSubnet',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifySubnet' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifySubnet',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeSubnets' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeSubnets',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AssociateNetworkAcl' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AssociateNetworkAcl',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DisassociateNetworkAcl' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DisassociateNetworkAcl',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeSubnetAvailableAddresses' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeSubnetAvailableAddresses',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateRoute' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateRoute',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteRoute' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteRoute',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeRoutes' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeRoutes',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateNetworkAcl' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateNetworkAcl',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteNetworkAcl' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteNetworkAcl',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyNetworkAcl' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyNetworkAcl',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateNetworkAclEntry' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateNetworkAclEntry',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteNetworkAclEntry' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteNetworkAclEntry',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeNetworkAcls' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeNetworkAcls',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateSecurityGroup' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateSecurityGroup',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteSecurityGroup' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteSecurityGroup',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifySecurityGroup' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifySecurityGroup',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AuthorizeSecurityGroupEntry' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AuthorizeSecurityGroupEntry',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'RevokeSecurityGroupEntry' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'RevokeSecurityGroupEntry',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeSecurityGroups' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeSecurityGroups',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateNat' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateNat',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteNat' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteNat',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyNat' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyNat',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeNats' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeNats',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AssociateNat' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AssociateNat',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DisassociateNat' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DisassociateNat',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeTunnels' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeTunnels',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyTunnel' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyTunnel',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AssociateSubnet' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AssociateSubnet',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DisassociateSubnet' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DisassociateSubnet',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AssociateRemoteCidr' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AssociateRemoteCidr',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DisassociateRemoteCidr' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DisassociateRemoteCidr',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeInternetGateways' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeInternetGateways',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'CreateVpcPeeringConnection' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateVpcPeeringConnection',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteVpcPeeringConnection' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteVpcPeeringConnection',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeVpcPeeringConnections' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeVpcPeeringConnections',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
    ];
}
