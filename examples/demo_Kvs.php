<?php
/**
 * 离线转码demo
 */
require('./vendor/autoload.php');
use Ksyun\Service\Kvs;

$method = $argv[1];

$arrMethod = array(
    'Preset',           // 设置模板
    'UpdatePreset',     // 更新模板
    'DelPreset',        // 删除模板\
    'GetPresetList',    // 获取模板列表
    'GetPresetDetail',  // 获取模板详情
    'CreateTask',       // 创建任务
    'CreateFlowTask',   // 创建流式任务
    'DelTaskByReqID',   // 删除任务
    'TopTaskByReqID',   // 置顶任务
    'GetTaskList',      // 获取任务列表
    'GetTaskByReqID',   // 获取任务详情
    'GetTaskMetaInfo',  // 获取任务META列表
    'BatchCreateTask',  // 批量创建任务
    'UpdatePipeline',   // 更新任务队列
    'QueryPipeline',    // 查询任务队列
    'GetMediaTransDuration',    // 查询转码时长
    'GetScreenshotNumber',      // 查询截图数量
    'GetInterfaceNumber',       // 查询接口调用次数
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

// 队列名称
$pipeline = 'usual';

// 更新队列数组
$pipeline_data = [
    'PipelineName' => $pipeline,
    'State' => 'Active',
    'RegularStart' => '01:00:00',
    'RegularDuration' => 7200,
    'Description' => 'low priority pipeline'
];

// 创建任务数组
$task_data = [
    'Preset' => $preset,
    'Pipeline' => $pipeline,
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
        'Pipeline' => $pipeline,
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
        'Pipeline' => $pipeline,
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

// 创建流式任务数组
$flowtask_data = [
    'Pipeline' => $pipeline,
    'FlowData' => [
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
            'ExtParam' => ''
        ]
    ],
    'IsTop' => 0,
    'CbUrl' => '',
    'CbMethod' => ''
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
    case 'CreateFlowTask':
        $response = Kvs::getInstance()->request($method, ['json' => $flowtask_data]);
        break;
    case 'BatchCreateTask':
        $response = Kvs::getInstance()->request($method, ['json' => $tasks_data]);
        break;
    case 'GetTaskByTaskID':
    case 'TopTaskByTaskID':
    case 'DelTaskByTaskID':
        $response = Kvs::getInstance()->request($method, ['query' => ['TaskID' => $taskid]]);
        break;
    case 'UpdatePipeline':
        $response = Kvs::getInstance()->request($method, ['json' => $pipeline_data]);
        break;
    case 'QueryPipeline':
        $response = Kvs::getInstance()->request($method, ['query' => ['PipelineName' => $pipeline]]);
        break;
    case 'GetMediaTransDuration':
    case 'GetScreenshotNumber':
    case 'GetInterfaceNumber':
        $response = Kvs::getInstance()->request($method, ['query' => ['StartUnixTime' => 1497542400, 'EndUnixTime' => 1497974400, 'Granularity' => 1440, 'ResultType' => 1]]);
        break;
}

print_r(json_decode((string)$response->getBody(), true) );

