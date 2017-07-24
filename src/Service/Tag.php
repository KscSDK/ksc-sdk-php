<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Tag extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'https://tag.{region}.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'tag',
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
        'CreateTags' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateTags',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DeleteTags' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteTags',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeTags' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeTags',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeTagValues' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeTagValues',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
        'DescribeTagKeys' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DescribeTagValues',
                    'Version' => '2016-03-04'
                ]
            ],
        ],
    ];
}
