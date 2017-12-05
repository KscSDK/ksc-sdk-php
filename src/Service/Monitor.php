<?php
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Monitor extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'http://monitor.{region}.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'monitor',
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
        'ListMetrics' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListMetrics',
                    'Version' => '2010-05-25'
                 ]
            ],
        ],
        'GetMetricStatistics' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetMetricStatistics',
                    'Version' => '2010-05-25'
                ]
            ],
        ],
    ];
}
