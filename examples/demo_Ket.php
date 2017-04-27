<?php
/**
 * 直播转码demo
 */
require('./vendor/autoload.php');
use Ksyun\Service\Ket;

$method = $argv[1];

$arrMethod = array(
    'Preset',			// 设置模板
    'UpdatePreset',     // 更新模版
    'DelPreset',		// 删除模板
    'GetPresetList',	// 获取模板列表
    'GetPresetDetail',  // 获取模板详情
    'GetStreamTranList',// 获取任务列表
    'StartStreamPull',  // 发起外网拉流
    'StopStreamPull',	// 停止外网拉流
    'GetQuotaUsed',     // 查询配额信息
    'StartLoop',        // 发起轮播
    'StopLoop',         // 停止轮播
    'UpdateLoop',       // 更新轮播时长
    'GetLoopList',      // 获取轮播列表
);

if (!in_array($method, $arrMethod)) {
    echo "method error!\n";
    exit;
}

$app = 'live'; // 频道名
$uniqname = 'test'; // 用户名
$preset = 'preset_demo'; // 模板名
$streamid = 'stream20170101'; // 流名

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

// 发起轮播
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
}

print_r(json_decode((string)$response->getBody(), true) );

