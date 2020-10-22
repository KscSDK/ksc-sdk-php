<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class BillUnion extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'https://bill-union.api.ksyun.com',
            'config' => [
                'timeout' => 10.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'bill-union',
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
        //计费类别汇总
        'DescribeBillSummaryByPayMode' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeBillSummaryByPayMode',
                    'Version' => '2020-01-01'
                ]
            ],
        ],
        //产品线账单汇总
        'DescribeBillSummaryByProduct' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeBillSummaryByProduct',
                    'Version' => '2020-01-01'
                ]
            ],
        ],
        //项目制账单汇总
        'DescribeBillSummaryByProject' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeBillSummaryByProject',
                    'Version' => '2020-01-01'
                ]
            ],
        ],
        //实例账单
        'DescribeInstanceSummaryBills' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeInstanceSummaryBills',
                    'Version' => '2020-01-01'
                ]
            ],
        ],
        //产品线列表
        'DescribeProductCode' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeProductCode',
                    'Version' => '2020-01-01'
                ]
            ],
        ],
        'GetIQIYIInstanceBill' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetIQIYIInstanceBill',
                    'Version' => '2020-01-01'
                ]
            ],
        ],
    ];
}
