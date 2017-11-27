<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Sts extends V4Curl 
{
    protected function getConfig()
    {
        return [
            'host' => 'https://sts.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'region' => 'cn-beijing-6',
                    'service' => 'sts',
                ],
            ],
        ];
    }

    protected $apiList = [
        'AssumeRole' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AssumeRole',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
    ];
}

