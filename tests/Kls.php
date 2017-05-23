<?php

namespace Ksyu\Tests;

use Ksyun\Service\Kls;

/**
* 
*/
class KlsTest extends \PHPUnit_Framework_TestCase
{
	private $arrMethod = array(
        'CreateRecordTask',			// 创建定时任务
        'CancelRecordTask',			// 取消定时任务
        'GetRecordTask',			// 获取任务详情
        'ListHistoryRecordTasks',	// 历史任务列表
        'StartStreamRecord',  		// 创建实时任务
        'StopStreamRecord',			// 停止实时任务
    );
	
}