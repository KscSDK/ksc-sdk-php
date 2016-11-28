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
	    //域名列表
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
		//新增域名
		'AddCdnDomain' => [
			'url' => '/2016-09-01/domain/AddCdnDomain',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'AddCdnDomain',
                ],
			],
		],
		//查询域名基础信息
		'GetCdnDomainBasic' => [
			'url' => '/2016-09-01/domain/GetCdnDomainBasicInfo',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'GetCdnDomainBasicInfo',
                ],
			],
		],
		//修改域名配置
		'ModifyCdnDomain' => [
			'url' => '/2016-09-01/domain/ModifyCdnDomainBasicInfo',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'ModifyCdnDomainBasicInfo',
                ],
			],
		],
		//启用、停用某个加速域名 StartStopCdnDomain
		'StartStopCdnDomain' => [
			'url' => '/2016-09-01/domain/StartStopCdnDomain',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'StartStopCdnDomain',
                ],
			],
		],
		//删除域名
		'DeleteCdnDomain' => [
			'url' => '/2016-09-01/domain/DeleteCdnDomain',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'DeleteCdnDomain',
                ],
			],
		],
		//查询域名详细配置信息
		'GetDomainConfigs' => [
			'url' => '/2016-09-01/domain/GetDomainConfigs',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'GetDomainConfigs',
                ],
			],
		],
		//设置过滤参数
		'SetIgnoreQueryStringConfig' => [
			'url' => '/2016-09-01/domain/SetIgnoreQueryStringConfig',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'SetIgnoreQueryStringConfig',
                ],
			],
		],
		//设置回源 host
		'SetBackOriginHostConfig' => [
			'url' => '/2016-09-01/domain/SetBackOriginHostConfig',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'SetBackOriginHostConfig',
                ],
			],
		],
		//设置refer防盗链 SetReferProtectionConfig
		'SetReferProtectionConfig' => [
			'url' => '/2016-09-01/domain/SetReferProtectionConfig',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action'=>'SetReferProtectionConfig',
                ],
			],
		],
	];
}


