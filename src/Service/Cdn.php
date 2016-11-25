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
			'host' => '',
            'timeout' => 5,  //此处设置无用，BaseCurl 没有设置
            'config' => [
                'headers' => [
                    'Accept' => 'application/json'
                ],
            ],
		];
	}
	protected $apiList =[
		'GetCdnDomains' => [
            'url' => '',
            'method' => 'get',
            'config' => [
                'query' => [
                   
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


