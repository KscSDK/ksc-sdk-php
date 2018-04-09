<?php
/**
 * @desc 直播服务
 * @author yangfan<yangfan16@kingsoft.com>
 * @date 2017/04/11
 */

namespace Ksyun\Service;

use Ksyun\Base\V4Curl;


class Kls extends V4Curl
{
	
	protected function getConfig()
	{
		return [
            'host' => 'http://kls.cn-beijing-6.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'kls',
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
        //定时录制接口(CreateRecordTask)
        'CreateRecordTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CreateRecordTask',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //定时录制取消接口(CancelRecordTask)
        'CancelRecordTask' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'CancelRecordTask',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //短视频开始录制接口(StartStreamRecord)
        'StartStreamRecord' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StartStreamRecord',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //短视频结束录制接口(StopStreamRecord)
        'StopStreamRecord' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'StopStreamRecord',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //查询在线录制任务接口(ListRecordingTasks)
        'ListRecordingTasks' => [
            'url' => '/',
            'method' => 'get',
            'cofig' => [
                'query' => [
                    'Action' => 'ListRecordingTasks',
                    'Version' => '2017-01-01',
                ],
            ],
        ],
        // 查询历史录制任务接口(ListHistoryRecordTasks)
        'ListHistoryRecordTasks' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListHistoryRecordTasks',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //查询录像任务状态接口(GetRecordTask)
        'GetRecordTask' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetRecordTask',
                    'Version' => '2017-01-01'
                ],
            ],
        ],

        // 禁止单路直播流推送（ForbidStream）
        'ForbidStream' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'ForbidStream',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        // 恢复单路直播流推送（ResumeStream）
        'ResumeStream' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'ResumeStream',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        // 查询黑名单列表（GetBlacklist）
        'GetBlacklist' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetBlacklist',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        // 检查流是否在黑名单内（CheckBlacklist）
        'CheckBlacklist' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CheckBlacklist',
                    'Version' => '2017-01-01'
                ],
            ],
        ],


         //查询推流实时信息接口（ListRealtimePubStreamsInfo）
        'ListRealtimePubStreamsInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListRealtimePubStreamsInfo',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //查询流历史信息接口(ListHistoryPubStreamsInfo）
        'ListHistoryPubStreamsInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListHistoryPubStreamsInfo',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //查询流历史错误信息接口(ListHistoryPubStreamsErrInfo)
        'ListHistoryPubStreamsErrInfo' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListHistoryPubStreamsErrInfo',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //录像查询接口
        'ListStreamRecordContent' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListStreamRecordContent',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
         // 转推实时信息查询接口（listRelayStreamsInfo）
        // 'listRelayStreamsInfo' => [
        //     'url' => '/',
        //     'method' => 'get',
        //     'config' => [
        //         'query' => [
        //             'Action' => 'listRelayStreamsInfo',
        //             'Version' => '2016-10-26'
        //         ],
        //     ],
        // ],
        // 转推历史错误统计接口（listRelayErrInfo）
        // 'listRelayErrInfo' => [
        //     'url' => '/',
        //     'method' => 'get',
        //     'config' => [
        //         'query' => [
        //             'Action' => 'listRelayErrInfo',
        //             'Version' => '2016-10-26'
        //         ],
        //     ],
        // ],
        //查询主播流时长接口(ListStreamDurations )
        'ListStreamDurations' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListStreamDurations',
                    'Version' => '2017-01-01'
                ],
            ],
        ],

       
        // 踢拉流接口 
        'KillStreamCache' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'KillStreamCache',
                    'Version' => '2017-01-01'
                ],
            ],
        ],

        //查询主播推拉流实时信息接口
        'ListRealtimeStreamsInfo' => [
            'url' => '/',
            'method' => 'post',
            'config' => [
                'query' => [
                    'Action' => 'ListRealtimeStreamsInfo',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
    ];
}

