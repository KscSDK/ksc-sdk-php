<?php
namespace Ksyun\Tests;
use Ksyun\Service\Kvs;

class KvsTest extends \PHPUnit_Framework_TestCase
{
    private $arrMethod = array(
        'Preset',			// 设置模板
        'UpdatePreset',		// 更新模板
        'DelPreset',		// 删除模板
        'GetPresetList',	// 获取模板列表
        'GetPresetDetail',  // 获取模板详情
        'CreateTask',		// 创建任务
        'DelTaskByReqID',   // 删除任务
        'TopTaskByReqID',	// 置顶任务
        'GetTaskList',		// 获取任务列表
        'GetTaskByReqID',	// 获取任务详情
        'GetTaskMetaInfo',  // 获取任务META列表
        'BatchCreateTask',  // 批量创建任务
    );

    public function testAllAPI()
    {
        foreach ($this->arrMethod as $method) {
            $response = Kvs::getInstance()->request($method);
            return $this->assertEquals($response->getStatusCode(), 200);
        }
    }

    public function testPreset()
    {
        $response = Kvs::getInstance()->request('Preset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdatePreset()
    {
        $response = Kvs::getInstance()->request('UpdatePreset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDelPreset()
    {
        $response = Kvs::getInstance()->request('DelPreset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetPresetList()
    {
        $response = Kvs::getInstance()->request('GetPresetList');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetPresetDetail()
    {
        $response = Kvs::getInstance()->request('GetPresetDetail');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreateTaskl()
    {
        $response = Kvs::getInstance()->request('CreateTask');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDelTaskByTaskID()
    {
        $response = Kvs::getInstance()->request('DelTaskByTaskID');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testTopTaskByTaskID()
    {
        $response = Kvs::getInstance()->request('TopTaskByTaskID');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetTaskList()
    {
        $response = Kvs::getInstance()->request('GetTaskList');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetTaskByTaskID()
    {
        $response = Kvs::getInstance()->request('GetTaskByTaskID');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetTaskMetaInfo()
    {
        $response = Kvs::getInstance()->request('GetTaskMetaInfo');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testBatchCreateTask()
    {
        $response = Kvs::getInstance()->request('BatchCreateTask');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
