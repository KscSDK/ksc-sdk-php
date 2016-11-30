<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Eip extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'https://eip.{region}.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'eip',
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
        'GetLines' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetLines',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AllocateAddress' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AllocateAddress',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ReleaseAddress' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ReleaseAddress',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AssociateAddress' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AssociateAddress',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DisassociateAddress' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DisassociateAddress',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeAddresses' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeAddresses',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyAddress' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyAddress',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'AssociateAddressPortfwd' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AssociateAddressPortfwd',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DisassociateAddressPortfwd' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DisassociateAddressPortfwd',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'ModifyAddressPortfwd' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ModifyAddressPortfwd',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeAddressPortfwds' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeAddressPortfwds',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
    ];
}
