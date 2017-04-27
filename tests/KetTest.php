<?php
namespace Ksyun\Tests;
use Ksyun\Service\Ket;

class KetTest extends \PHPUnit_Framework_TestCase
{
    private $arrMethod = array(
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

    public function testAllAPI()
    {
        foreach ($this->arrMethod as $method) {
            $response = Ket::getInstance()->request($method);
            return $this->assertEquals($response->getStatusCode(), 200);
        }
    }

    public function testPreset()
    {
        $response = Ket::getInstance()->request('Preset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdatePreset()
    {
        $response = Ket::getInstance()->request('UpdatePreset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDelPreset()
    {
        $response = Ket::getInstance()->request('DelPreset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetPresetList()
    {
        $response = Ket::getInstance()->request('GetPresetList');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetPresetDetail()
    {
        $response = Ket::getInstance()->request('GetPresetDetail');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetStreamTranList()
    {
        $response = Ket::getInstance()->request('GetStreamTranList');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStartStreamPull()
    {
        $response = Ket::getInstance()->request('StartStreamPull');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStopStreamPull()
    {
        $response = Ket::getInstance()->request('StartStreamPull');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetQuotaUsed()
    {
        $response = Ket::getInstance()->request('GetQuotaUsed');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStartLoop()
    {
        $response = Ket::getInstance()->request('StartLoop');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStopLoop()
    {
        $response = Ket::getInstance()->request('StopLoop');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdateLoop()
    {
        $response = Ket::getInstance()->request('UpdateLoop');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetLoopList()
    {
        $response = Ket::getInstance()->request('GetLoopList');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
