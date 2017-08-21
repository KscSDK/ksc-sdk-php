<?php
/**
 * 直播转码demo
 */
require('./vendor/autoload.php');
use Ksyun\Service\Ket;

$method = $argv[1];

$arrMethod = array(
    'Preset',               // 设置模板
    'UpdatePreset',         // 更新模版
    'DelPreset',            // 删除模板
    'GetPresetList',        // 获取模板列表
    'GetPresetDetail',      // 获取模板详情
    'GetStreamTranList',    // 获取任务列表
    'StartStreamPull',      // 发起外网拉流
    'StopStreamPull',       // 停止外网拉流
    'GetQuotaUsed',         // 查询配额信息
    'StartLoop',            // 发起轮播
    'StopLoop',             // 停止轮播
    'UpdateLoop',           // 更新轮播时长
    'GetLoopList',          // 获取轮播列表
    'CreateDirectorTask',   // 创建选流任务
    'UpdateDirectorTask',   // 更新选流任务
    'QueryDirectorTask',    // 查询选流任务
    'DelDirectorTask',      // 删除选流任务
    'GetLiveTransDuration', // 查询转码时长分布
);

if (!in_array($method, $arrMethod)) {
    echo "method error!\n";
    exit;
}

$app = 'live'; // 频道名
$uniqname = 'test'; // 用户名
$preset = 'preset_demo'; // 模板名
$streamid = 'stream20170101'; // 流名
$taskid = '52b7575e7e11bdd84f5a77ceb0ab0c94'; // 任务ID

// 创建模板数组
$preset_data = [
    'Preset' => $preset,
    'App' => $app,
    'Description' => 'desc: preset demo',
    'Output' => [
        [
            'format' => [
                'output_format' => 256,
                'abr' => 60000,
                'vbr' => 800000,
                'fr' => 25,
                'logo_switch' => 1
            ]
        ],
        [
            'format' => [
                'output_format' => 257,
                'abr' => 70000,
                'vbr' => 700000,
                'fr' => 23,
                'logo_switch' => 0
            ]
        ]
    ],
    'Video' => [
        'logo' => [
            [
                'pic' => 'wangshuai9/ksyun.png',
                'short_side' => 480,
                'disable_scale' => 0,
                'offsetX' => 10,
                'offsetY' => -20
            ]
        ]
    ],
    'Audio' => [],
];

// 发起外网拉流数组
$outpull_data = [
    'App' => $app,
    'StreamID' => $streamid,
    'SrcUrl' => 'rtmp://test.rtmplive.ks-cdn.com/live/streamdemo',
    'Params' => ''
];

// 发起轮播数组
$loop_data = [
    'App' => $app,
    'Preset' => $preset,
    'StreamID' => $streamid,
    'PubDomain' => 'test.uplive.ksyun.com',
    'DurationHour' => 168,
    'SrcInfo' => array(
        array(
            'Path' => 'http://wangshuai9.ks3-cn-beijing.ksyun.com/ksyun.flv',
            'Index' => 0,
        )
    )
];

// 发起选流数组
$director_data = [
    'App' => $app,
    'SrcInfo' => [
        [
            "Index" => 0,
            "SrcUrl" => "rtmp://test.rtmplive.ks-cdn.com/live/streamdemo"
        ],
        [
            "Index" => 1,
            "StreamID" => $streamid
        ]
    ],
    "DstInfo" => [
        [
            "Index" => 0,
            "StreamID" => "stream0ForMonitor"
        ],
        [
            "Index" => 1,
            "StreamID" => "stream1ForMonitor"
        ],
        [
            "Index" => 2,
            "Mainly" => 1,
            "StreamID" => "streamForPlay"
        ]
    ],
    "Output" => [
        [
            "Index" => 0,
            "Overlay" =>[["InputIdx" => 0]],
            "Amix" => [["InputIdx" => 0]]
        ],
        [
            "Index" => 1,
            "Overlay" => [["InputIdx" => 1]],
            "Amix" => [["InputIdx" => 1]]
        ],
        [
            "Index" => 2,
            "Video" => ["Codec" => "copy"],
            "Audio" => ["Codec" => "copy"],
            "Overlay" => [["InputIdx" => 1]],
            "Amix" => [["InputIdx" => 1]],
        ]
    ]
];

// 更新选流数组
$update_director_data = array_merge( array('TaskID' => $taskid), $director_data);

switch($method) {
    case 'Preset':
    case 'UpdatePreset':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname], 'json' => $preset_data]);
        break;
    case 'DelPreset':
    case 'GetPresetDetail':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname, 'App' => $app, 'Preset' => $preset]]);
        break;
    case 'GetPresetList':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname, 'App' => $app]]);
        break;
    case 'GetStreamTranList':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname, 'App' => $app]]);
        break;
    case 'StartStreamPull':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname], 'json' => $outpull_data]);
        break;
    case 'StopStreamPull':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname], 'json' => ['App' => $app, 'StreamID' => $streamid]]);
        break;
    case 'GetQuotaUsed':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname]]);
        break;
    case 'StartLoop':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname], 'json' => $loop_data]);
        break;
    case 'StopLoop':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname], 'json' => ['App' => $app, 'StreamID' => $streamid]]);
        break;
    case 'UpdateLoop':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname], 'json' => ['App' => $app, 'StreamID' => $streamid, 'DurationHour' => 168]]);
        break;
    case 'GetLoopList':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname, 'App' => $app]]);
        break;
    case 'CreateDirectorTask':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname], 'json' => $director_data]);
        break;
    case 'UpdateDirectorTask':
        $response = Ket::getInstance()->request($method, ['query' =>['UniqName' => $uniqname], 'json' => $update_director_data]);
        break;
    case 'QueryDirectorTask':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname, 'App' => $app, 'TaskID' => $taskid]]);
        break;
    case 'DelDirectorTask':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname, 'App' => $app, 'TaskID' => $taskid]]);
        break;
    case 'GetLiveTransDuration':
        $response = Ket::getInstance()->request($method, ['query' => ['UniqName' => $uniqname, 'ResultType' => 1]]);
        break;
}

print_r(json_decode((string)$response->getBody(), true) );

