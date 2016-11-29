<?php
/**
 *  creator: dinglei
 */

namespace Ksyun\Service;

use Ksyun\Base\V4Curl;

class Cdn extends V4Curl
{
	protected function getConfig()
	{
		return [
			'host' => 'http://cdn.api.ksyun.com',
            'timeout' => 60,  //设置timeout
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
				   'X-Action' => 'GetCdnDomains',
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
				   'X-Action' => 'AddCdnDomain',
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
				   'X-Action' => 'GetCdnDomainBasicInfo',
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
				   'X-Action' => 'ModifyCdnDomainBasicInfo',
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
				   'X-Action' => 'StartStopCdnDomain',
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
				   'X-Action' => 'DeleteCdnDomain',
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
				   'X-Action' => 'GetDomainConfigs',
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
				   'X-Action' => 'SetIgnoreQueryStringConfig',
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
				   'X-Action' => 'SetBackOriginHostConfig',
                ],
			],
		],
		//设置refer防盗链 
		'SetReferProtectionConfig' => [
			'url' => '/2016-09-01/domain/SetReferProtectionConfig',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'SetReferProtectionConfig',
                ],
			],
		],
		//设置缓存策略 post
		'SetCacheRuleConfig' => [
			'url' => '/2016-09-01/domain/SetCacheRuleConfig',
			'method' => 'post',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'SetCacheRuleConfig',
				   'content-type' => 'application/json',
                ],
			],
		],
		//设置测试url
		'SetTestUrlConfig' => [
			'url' => '/2016-09-01/domain/SetTestUrlConfig',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'SetTestUrlConfig',
                ],
			],
		],
		//设置高级回源 post
		'SetOriginAdvancedConfig' => [
			'url' => '/2016-09-01/domain/SetOriginAdvancedConfig',
			'method' => 'post',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'SetOriginAdvancedConfig',
				   'content-type' => 'application/json',
                ],
			],
		],
		//设置备注信息
		'SetRemarkConfig' => [
			'url' => '/2016-09-01/domain/SetRemarkConfig',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'SetRemarkConfig',
                ],
			],
		],
        
        //查询带宽 
        'GetBandwidthData' => [
			'url' => '/2016-09-01/statistics/GetBandwidthData',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'GetBandwidthData',
                ],
			],
		],
        //查询流量
        'GetFlowData' => [
			'url' => '/2016-09-01/statistics/GetFlowData',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'GetFlowData',
                ],
			],
		],
        //请求数查询
        'GetPvData' => [
			'url' => '/2016-09-01/statistics/GetPvData',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'GetPvData',
                ],
			],
		],
        //命中率详情查询
        'GetHitRateDetailedData' => [
			'url' => '/2016-09-01/statistics/GetHitRateDetailedData',
			'method' => 'get',
			'config' => [
				'header' => [
                   'X-Version' => '2016-09-01',
				   'X-Action' => 'GetHitRateDetailedData',
                ],
			],
		],
	];
}


