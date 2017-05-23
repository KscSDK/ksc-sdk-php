<?php

namespace Ksyu\Tests;

use Ksyun\Service\Kls;

/**
* 
*/
class KlsTest extends \PHPUnit_Framework_TestCase
{
	private $arrMethod = array(
        'CreateRecordTask',                 // 创建定时任务
        'CancelRecordTask',                 // 取消定时任务
        'GetRecordTask',                    // 获取任务详情
        'ListHistoryRecordTasks',           // 历史任务列表
        'StartStreamRecord',                // 创建实时任务
        'StopStreamRecord',                 // 停止实时任务
        'ListRecordingTasks',               // 查询在线录制任务
        'ListStreamDurations',              // 主播流时长统计
        'ListRealtimePubStreamsInfo',       // 查询流实时信息
        'ListHistoryPubStreamsInfo',        // 查询流历史信息
        'ListHistoryPubStreamsErrInfo'      // 查询流历史错误信息
    );


    public function testAllAPI()
    {
        foreach ($this->arrMethod as $method) {
            $response = Offline::getInstance()->request($method);
            return $this->assertEquals($response->getStatusCode(), 200);
        }
    }

    public function testCreateRecordTask()
    {
        $response = kls::getInstance()->request('CreateRecordTask');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCancelRecordTask()
    {
        $response = kls::getInstance()->request('CancelRecordTask');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetRecordTask()
    {
        $response = kls::getInstance()->request('GetRecordTask');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListHistoryRecordTasks()
    {
        $response = kls::getInstance()->request('ListHistoryRecordTasks');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStartStreamRecord()
    {
        $response = kls::getInstance()->request('StartStreamRecord');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStopStreamRecord()
    {
        $response = kls::getInstance()->request('StopStreamRecord');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListRecordingTasks()
    {
        $response = kls::getInstance()->request('ListRecordingTasks');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListStreamDurations()
    {
        $response = kls::getInstance()->request('ListStreamDurations');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListRealtimePubStreamsInfo()
    {
        $response = kls::getInstance()->request('ListRealtimePubStreamsInfo');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListHistoryPubStreamsInfo()
    {
        $response = kls::getInstance()->request('ListHistoryPubStreamsInfo');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListHistoryPubStreamsErrInfo()
    {
        $response = kls::getInstance()->request('ListHistoryPubStreamsErrInfo');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
	
}