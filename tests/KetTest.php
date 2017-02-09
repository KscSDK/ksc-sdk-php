<?php
namespace Ksyun\Tests;
use Ksyun\Service\Ket;

class KetTest extends \PHPUnit_Framework_TestCase
{
    private $arrMethod = array(
        'Preset',			// 设置模板
        'DelPreset',		// 删除模板
        'GetPresetList',	// 获取模板列表
        'GetPresetDetail',  // 获取模板详情
        'GetStreamTranList',// 获取任务列表
        'StartStreamPull',  // 发起外网拉流
        'StopStreamPull',	// 停止外网拉流
        'GetQuotaUsed',     // 查询配额信息
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
}
