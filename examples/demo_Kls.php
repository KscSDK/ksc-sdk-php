<?php
require('./vendor/autoload.php');

use Ksyun\Service\Kls;

$method = $argv[1];

$arrMethod = array(
    'CreateRecordTask',                 // 创建定时任务
    'CancelRecordTask',                 // 取消定时任务
    'StartStreamRecord',                // 创建实时任务
    'StopStreamRecord',                 // 停止实时任务
    'ListRecordingTasks',               // 查询在线录制任务
    'ListHistoryRecordTasks',           // 历史任务列表
    'GetRecordTask',                    // 查询录像任务状态接口
    'ForbidStream',                     // 禁止单路直播流推送
    'ResumeStream',                     // 恢复单路直播流推送
    'GetBlacklist',                     // 查询黑名单列表
    'CheckBlacklist',                   // 检查流是否在黑名单内
    'ListRealtimePubStreamsInfo',       // 查询流实时信息
    'ListHistoryPubStreamsInfo',        // 查询流历史信息
    'ListHistoryPubStreamsErrInfo',     // 查询流历史错误信息
    'ListStreamDurations',              // 主播流时长统计
    'ListStreamRecordContent',           // 录像查询
    'KillStreamCache',                  // 踢拉流接口
    'ListRealtimeStreamsInfo',          // 查询主播推拉流实时信息接口
);

if (!in_array($method, $arrMethod)) {
    echo "method error!\n";
    exit;
}

$app = 'app';                          // 频道名
$uniqname = 'unique_name';                 // 用户名
$pubdomain = "pubdomain";
$stream = 'test';                       // 流名
$forbidTillUnixTime = -1;               // 禁推结束时间


// 组织禁止单路流数据
$forbid_stream_data = [
    'UniqueName' => $uniqname,
    'App' => $app,
    'Pubdomain' => $pubdomain,
    'Stream' => $stream,
];


// 组织查询主播推拉流实时信息的数据
$list_realtime_stream_info_data = [
    'UniqueName' => $uniqname,
    'App' => $app,
];


switch($method) {
    case 'CreateRecordTask':
        $response = Kls::getInstance()->request($method, ['json' => $create_record_data]);
        break;
    case 'CancelRecordTask':
        $response = Kls::getInstance()->request($method, ['json' => $cancel_record_data]);
        break;
    case 'StartStreamRecord':
        $response = Kls::getInstance()->request($method, ['json' => $start_stream_record]);
        break;
    case 'StopStreamRecord':
        $response = Kls::getInstance()->request($method, ['json' => $stop_stream_record]);
        break;
    case 'ListHistoryRecordTasks':
         $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name,"App" => $app, 'Pubdomain' => $pubdomain, 'StartUnixTime' => $start_unix_time, 
            'EndUnixTime' => $end_unix_time, 'OrderTime' => $order_time, 'RecType' => $rec_type, 'Marker' => $marker, 'Limit' => $limit]]
        );
        break;
    case 'ListRecordingTasks':
         $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name,"App" => $app, 'Pubdomain' => $pubdomain, 'Stream' => $stream, 
            'OrderTime' => $order_time, 'RecType' => $rec_type, 'Marker' => $marker, 'Limit' => $limit, 'RecStatusType' => $rec_status_type]]
        );
        break;
    case 'GetRecordTask':
        $response = Kls::getInstance()->request($method, ['query' => ['RecID' => $rec_id]]);
        break;
    case 'ForbidStream':
         $response = Kls::getInstance()->request($method, ['json' => $forbid_stream_data]);
        break;
     case 'ResumeStream':
        $response = Kls::getInstance()->request($method, ['json' => $resume_stream_data]);
        break;
    case 'GetBlacklist':
        $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name, "App" => $app, 'Pubdomain' => $pubdomain]]);
        break;
     case 'CheckBlacklist':
         $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name, "App" => $app, 'Pubdomain' => $pubdomain,'Stream' => $stream]]);
        break;
    case 'ListRealtimePubStreamsInfo':
        $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name,"App" => $app, 'Pubdomain' => $pubdomain, 'Stream' => $stream, 
            'OrderTime' => $order_time,'Marker' => $marker, 'Limit' => $limit]]
        );
         break;
    case 'ListHistoryPubStreamsInfo':
         $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name,"App" => $app, 'Pubdomain' => $pubdomain, 'Stream' => $stream, 
            'OrderTime' => $order_time,'Marker' => $marker, 'Limit' => $limit,'StartUnixTime' => $start_unix_time, 
            'EndUnixTime' => $end_unix_time]]
        );
        break;
    case 'ListHistoryPubStreamsErrInfo':
        $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name,"App" => $app, 'Pubdomain' => $pubdomain, 'Stream' => $stream, 
            'OrderTime' => $order_time,'Marker' => $marker, 'Limit' => $limit,'StartUnixTime' => $start_unix_time, 
            'EndUnixTime' => $end_unix_time]]
        );
        break;
    case 'ListStreamDurations':
        $response = Kls::getInstance()->request($method, 
            ['query' => ['UniqueName' => $unique_name,"App" => $app, 'Pubdomain' => $pubdomain, 'Stream' => $stream, 
            'StartUnixTime' => $start_unix_time, 'EndUnixTime' => $end_unix_time]]
        );
         break;
    case 'ListStreamRecordContent':
        $response = Kls::getInstance()->request($method, 
            ['query' => ['App' => $app,"Pubdomain" => $pubdomain, 'VideoType' => 'flv', 'Stream' => $stream, 
            'StartUnixTime' => $start_unix_time, 'EndUnixTime' => $end_unix_time]]
        );
        break;
    case 'KillStreamCache':
        $response = Kls::getInstance()->request($method, ['json' => $kill_stream_data]);
        break;
    case 'ListRealtimeStreamsInfo':
        $response = Kls::getInstance()->request($method, ['json' => $list_realtime_stream_info_data]);
        break;
}

print_r(json_decode((string)$response->getBody(), true) );
