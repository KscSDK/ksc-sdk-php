<?php
/**
 * 直播转码demo
 */
require('./vendor/autoload.php');
use Ksyun\Service\Livetran;

$method = $argv[1];

$arrMethod = array(
    'Preset',			// 设置模板
    'DelPreset',		// 删除模板
    'GetPresetList',	// 获取模板列表
    'GetPresetDetail',  // 获取模板详情
    'GetStreamTranList',// 获取任务列表
    'StartStreamPull',  // 发起外网拉流
    'StopStreamPull',	// 停止外网拉流
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
    'preset' => $preset,
    'app' => $app,
    'description' => 'desc: preset demo',
    'output' => [
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
    'video' => [
        'logo' => [
            [
                'pic' => 'wangshuai9/ksyun.png',
                'short_side' => 480,
                'disable_scale' => 0,
                'offsetX' => 10,
                'offsetY' => -20
            ]
        ]
    ]
];

// 发起外网拉流数组
$outpull_data = [
    'app' => $app,
    'streamid' => $streamid,
    'srcurl' => 'rtmp://test.rtmplive.ks-cdn.com/live/streamdemo',
    'params' => ''
];

switch($method) {
    case 'Preset':
        $response = Livetran::getInstance()->request($method, ['query' => ['uniqname' => $uniqname], 'json' => $preset_data]);
        break;
    case 'DelPreset':
    case 'GetPresetDetail':
        $response = Livetran::getInstance()->request($method, ['query' => ['uniqname' => $uniqname, 'app' => $app, 'preset' => $preset]]);
        break;
    case 'GetPresetList':
        $response = Livetran::getInstance()->request($method, ['query' => ['uniqname' => $uniqname, 'app' => $app]]);
        break;
    case 'GetStreamTranList':
        $response = Livetran::getInstance()->request($method, ['query' => ['uniqname' => $uniqname, 'app' => $app]]);
        break;
    case 'StartStreamPull':
        $response = Livetran::getInstance()->request($method, ['query' => ['uniqname' => $uniqname], 'json' => $outpull_data ]);
        break;
    case 'StopStreamPull':
        $response = Livetran::getInstance()->request($method, ['query' => ['uniqname' => $uniqname], 'json' => ['app' => $app, 'streamid' => $streamid]]);
        break;
}

print_r(json_decode((string)$response->getBody(), true) );

