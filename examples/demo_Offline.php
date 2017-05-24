<?php
/**
 * 离线转码demo
 */
require('./vendor/autoload.php');
use Ksyun\Service\Offline;

$method = $argv[1];

$arrMethod = array(
    'Preset',           // 设置模板
    'UpdatePreset',		// 更新模板
    'DelPreset',		// 删除模板
    'GetPresetList',	// 获取模板列表
    'GetPresetDetail',  // 获取模板详情
    'CreateTask',		// 创建任务
    'DelTaskByTaskID',  // 删除任务
    'TopTaskByTaskID',	// 置顶任务
    'GetTaskList',		// 获取任务列表
    'GetTaskByTaskID',	// 获取任务详情
    'GetTaskMetaInfo',  // 获取任务META列表
    'BatchCreateTask',  // 批量创建任务
);

if (!in_array($method, $arrMethod)) {
    echo "method error!\n";
    exit;
}

// 模板名称
$preset = 'preset_avop1';

// 创建模板数组
$preset_data = [
    'preset' => $preset,
    'presettype' => 'avop',
    'param' => [
        'f'=>'flv',
        'VIDEO' => [
            'vr' => '13',
            'vb' => '780000',
            'vcodec' => 'h264',
            'width' => 500,
            'height' => 600,
            'as' => 0,
            'rotate' => '0',
            'vn' => 0
        ],
        'AUDIO' => [
            'ar' => '44100',
            'ab' => '64k',
            'acodec' => 'aac',
            'an' => 0
        ]
    ],
    'description'=>'desc:preset_avop1'
];

// 创建任务数组
$task_data = [
    'preset' => $preset,
    'srcInfo' => [
        [
            'path' => '/wangshuai9/ksyun.flv',
            'index' => 0,
            'type' => 'video'
        ]
    ],
    'dstBucket' => 'wangshuai9',
    'dstDir' => '',
    'dstObjectKey' => 'ksyun_1.flv',
    'dstAcl' => 'public-read',
    'isTop' => 0,
    'cbUrl' => '',
    'cbMethod' => '',
    'extParam' => ''
];

// 批量创建任务数组
$tasks_data = [
    [
        'preset' => $preset,
        'srcInfo' => [
            [
                'path' => '/wangshuai9/ksyun1.flv',
                'index' => 0,
                'type' => 'video'
            ]
        ],
        'dstBucket' => 'wangshuai9',
        'dstDir' => '',
        'dstObjectKey' => 'ksyun_1.flv',
        'dstAcl' => 'public-read',
        'isTop' => 0,
        'cbUrl' => '',
        'cbMethod' => '',
        'extParam' => ''
    ],
    [
        'preset' => $preset,
        'srcInfo' => [
            [
                'path' => '/wangshuai9/ksyun2.flv',
                'index' => 0,
                'type' => 'video'
            ]
        ],
        'dstBucket' => 'wangshuai9',
        'dstDir' => '',
        'dstObjectKey' => 'ksyun_2.flv',
        'dstAcl' => 'public-read',
        'isTop' => 0,
        'cbUrl' => '',
        'cbMethod' => '',
        'extParam' => ''
    ]
];

// 任务ID
$taskid = '99df258304633fd3a60b8899b9d726eb20160921';

switch($method) {
    case 'Preset':
    case 'UpdatePreset':
        $response = Offline::getInstance()->request($method, ['json' => $preset_data]);
        break;
    case 'DelPreset':
    case 'GetPresetDetail':
        $response = Offline::getInstance()->request($method, ['query' => ['preset' => $preset]]);
        break;
    case 'GetPresetList':
    case 'GetTaskList':
    case 'GetTaskMetaInfo':
        $response = Offline::getInstance()->request($method);
        break;
    case 'CreateTask':
        $response = Offline::getInstance()->request($method, ['json' => $task_data]);
        break;
    case 'BatchCreateTask':
        $response = Offline::getInstance()->request($method, ['json' => $tasks_data]);
        break;
    case 'GetTaskByTaskID':
    case 'TopTaskByTaskID':
    case 'DelTaskByTaskID':
        $response = Offline::getInstance()->request($method, ['query' => ['taskid' => $taskid]]);
        break;
}

print_r(json_decode((string)$response->getBody(), true) );

