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
        //定时录制接口
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
        //定时录制取消接口
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
        //查询录像任务状态
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
        //查询历史录制任务
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
        //短视频开始录制
        'StartStreamRecord' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'StartStreamRecord',
                    'Version' => '2017-01-01'
                ],
            ],
        ],
        //短视频结束录制
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
        //查询在线录制任务
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
        //主播流时长统计
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
        //查询流实时信息
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
        //查询流历史信息
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
        //查询流历史错误信息
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
    ];
}

