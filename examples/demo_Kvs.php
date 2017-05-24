<?php
/**
 * 离线转码demo
 */
require('./vendor/autoload.php');
use Ksyun\Service\Kvs;

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
    'Preset' => $preset,
    'PresetType' => 'avop',
    'Param' => [
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
    'Description'=>'desc:preset_avop1'
];

// 创建任务数组
$task_data = [
    'Preset' => $preset,
    'SrcInfo' => [
        [
            'path' => '/wangshuai9/ksyun.flv',
            'index' => 0,
            'type' => 'video'
        ]
    ],
    'DstBucket' => 'wangshuai9',
    'DstDir' => '',
    'DstObjectKey' => 'ksyun_1.flv',
    'DstAcl' => 'public-read',
    'IsTop' => 0,
    'CbUrl' => '',
    'CbMethod' => '',
    'ExtParam' => ''
];

// 批量创建任务数组
$tasks_data = [
    [
        'Preset' => $preset,
        'SrcInfo' => [
            [
                'path' => '/wangshuai9/ksyun1.flv',
                'index' => 0,
                'type' => 'video'
            ]
        ],
        'DstBucket' => 'wangshuai9',
        'DstDir' => '',
        'DstObjectKey' => 'ksyun_1.flv',
        'DstAcl' => 'public-read',
        'IsTop' => 0,
        'CbUrl' => '',
        'CbMethod' => '',
        'ExtParam' => ''
    ],
    [
        'Preset' => $preset,
        'SrcInfo' => [
            [
                'path' => '/wangshuai9/ksyun2.flv',
                'index' => 0,
                'type' => 'video'
            ]
        ],
        'DstBucket' => 'wangshuai9',
        'DstDir' => '',
        'DstObjectKey' => 'ksyun_2.flv',
        'DstAcl' => 'public-read',
        'IsTop' => 0,
        'CbUrl' => '',
        'CbMethod' => '',
        'ExtParam' => ''
    ]

];

// 任务ID
$taskid = '99df258304633fd3a60b8899b9d726eb20160921';

switch($method) {
    case 'Preset':
    case 'UpdatePreset':
        $response = Kvs::getInstance()->request($method, ['json' => $preset_data]);
        break;
    case 'DelPreset':
    case 'GetPresetDetail':
        $response = Kvs::getInstance()->request($method, ['query' => ['Preset' => $preset]]);
        break;
    case 'GetPresetList':
    case 'GetTaskList':
    case 'GetTaskMetaInfo':
        $response = Kvs::getInstance()->request($method);
        break;
    case 'CreateTask':
        $response = Kvs::getInstance()->request($method, ['json' => $task_data]);
        break;
    case 'BatchCreateTask':
        $response = Kvs::getInstance()->request($method, ['json' => $tasks_data]);
        break;
    case 'GetTaskByTaskID':
    case 'TopTaskByTaskID':
    case 'DelTaskByTaskID':
        $response = Kvs::getInstance()->request($method, ['query' => ['TaskID' => $taskid]]);
        break;
}

print_r(json_decode((string)$response->getBody(), true) );

