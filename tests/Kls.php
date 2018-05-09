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
        'StartStreamRecord',                // 创建实时任务
        'StopStreamRecord',                 // 停止实时任务
        'ListRecordingTasks',               // 查询在线录制任务
        'ListHistoryRecordTasks',           // 历史任务列表
        'GetRecordTask',                    // 获取任务详情
        'ForbidStream',                     // 禁止单路直播流推送
        'ResumeStream',                     // 恢复单路直播流推送
        'GetBlacklist',                     // 查询黑名单列表
        'CheckBlacklist',                   // 检查流是否在黑名单内
        'ListRealtimePubStreamsInfo',       // 查询流实时信息
        'ListHistoryPubStreamsInfo',        // 查询流历史信息
        'ListHistoryPubStreamsErrInfo',     // 查询流历史错误信息
        // 'listRelayStreamsInfo',             // 转推实时信息查询接口
        // 'listRelayErrInfo',                 // 转推历史错误统计接口
        'ListStreamDurations',              // 主播流时长统计
        'ListStreamRecordContent',          // 录像查询
        'KillStreamCache',                  // 踢拉流接口
        'ListRealtimeStreamsInfo',          // 查询主播推拉流实时信息接口
    );


    public function testAllAPI()
    {
        foreach ($this->arrMethod as $method) {
            $response = Kls::getInstance()->request($method);
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

    public function testForbidStream()
    {
        $response = kls::getInstance()->request('ForbidStream');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testResumeStream()
    {
        $response = kls::getInstance()->request('ResumeStream');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetBlacklist()
    {
        $response = kls::getInstance()->request('GetBlacklist');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCheckBlacklist()
    {
        $response = kls::getInstance()->request('CheckBlacklist');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListRelayStreamsInfo()
    {
        $response = kls::getInstance()->request('listRelayStreamsInfo');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

     public function testListRelayErrInfo()
    {
        $response = kls::getInstance()->request('listRelayErrInfo');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    public function testListStreamRecordContent()
    {
        $response = kls::getInstance()->request('ListStreamRecordContent');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

     public function testKillStreamCache()
    {
        $response = kls::getInstance()->request('KillStreamCache');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListRealtimeStreamsInfo()
    {
        $response = kls::getInstance()->request('ListRealtimeStreamsInfo');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
	
}
