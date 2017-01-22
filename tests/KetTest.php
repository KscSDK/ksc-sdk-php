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
            $response = Livetran::getInstance()->request($method);
            return $this->assertEquals($response->getStatusCode(), 200);
        }
    }

    public function testPreset()
    {
        $response = Livetran::getInstance()->request('Preset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDelPreset()
    {
        $response = Livetran::getInstance()->request('DelPreset');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetPresetList()
    {
        $response = Livetran::getInstance()->request('GetPresetList');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetPresetDetail()
    {
        $response = Livetran::getInstance()->request('GetPresetDetail');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetStreamTranList()
    {
        $response = Livetran::getInstance()->request('GetStreamTranList');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStartStreamPull()
    {
        $response = Livetran::getInstance()->request('StartStreamPull');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStopStreamPull()
    {
        $response = Livetran::getInstance()->request('StartStreamPull');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetQuotaUsed()
    {
        $response = Livetran::getInstance()->request('GetQuotaUsed');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
