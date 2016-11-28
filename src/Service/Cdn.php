<?php
/**
 *
 */

namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Cdn extends V4Curl
{
	protected function getConfig()
	{
		return [
			'host' => 'http://cdn.api.ksyun.com',
            'timeout' => 60,  //此处设置无用，BaseCurl 没有设置
            'config' => [
                'v4_credentials' => [
                    'region' => 'cn-shanghai-1',
                    'service' => 'cdn',
                ],
            ],
		];
	}
	protected $apiList =[
		'GetCdnDomains' => [
            'url' => '/2016-09-01/domain/GetCdnDomains',
            'method' => 'get',
            'config' => [
                'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'GetCdnDomains',
                ],
            ],
        ],
		'AddDomain' => [
			'url' => '',
			'method' => '',
			'config' => [
				'query' => [
				],
			],
		],
	];
}


