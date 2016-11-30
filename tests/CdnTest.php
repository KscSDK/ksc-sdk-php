<?php
/**
 *  creator: dinglei
 */
 
namespace Ksyun\Tests;

use Ksyun\Service\Cdn;

class CdnTest extends \PHPUnit_Framework_TestCase
{
	//域名列表
	public function testGetCdnDomains()
	{
		$params = [
			'query'=>[
				'PageSize' => '20',
				'PageNumber' => '1',
				'DomainName' => '',
				'DomainStatus' => 'online',
				'CdnType' => 'download',
				'FuzzyMatch' => '',
			],
		];
		$response = Cdn::getInstance()->request('GetCdnDomains', $params);
		return $this->assertEquals($response->getStatusCode(), 200);
	}
	//新增域名
	public function testAddCdnDomain()
	{
		$params = [
			'query'=>[
				'DomainName' => 'www.qunar.com',
				'CdnType' => 'download',
				//'CdnSubType' => '',
				'CdnProtocol' => 'http',
				'Regions' => 'CN',
				'OriginType' => 'domain',
				'OriginProtocol' => 'http',
				'OriginPort' => '80',
				'Origin' => 'www.ksyun.com',
			],
		];
		$response = Cdn::getInstance()->request('AddCdnDomain', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//查询域名基础信息
	public function testGetCdnDomainBasic()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
			],
		];
		$response = Cdn::getInstance()->request('GetCdnDomainBasic', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//修改域名配置
	public function testModifyCdnDomain()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				'Origin' => 'www.ks-cdn.com',
				'OriginType' => 'domain',
				'OriginPort' => '80',
				//'Regions' => '',
			],
		];
		$response = Cdn::getInstance()->request('ModifyCdnDomain', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//启用、停用某个加速域名 StartStopCdnDomain
	public function testStartStopCdnDomain()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				'ActionType' => 'start',
			],
		];
		$response = Cdn::getInstance()->request('StartStopCdnDomain', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//删除域名,没有测试案例

	//查询域名详细配置信息
	public function testGetDomainConfigs()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				//'ConfigList' => 'cache_expired,cc,ignore_query_string',   //过滤规则
			],
		];
		$response = Cdn::getInstance()->request('GetDomainConfigs', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//设置过滤参数
	public function testSetIgnoreQueryStringConfig()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				'Enable' => 'on',   //  on  或者 off
			],
		];
		$response = Cdn::getInstance()->request('SetIgnoreQueryStringConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//设置回源 host
	public function testSetBackOriginHostConfig()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				'BackOriginHost' => 'www.a.qunar.com',   //
			],
		];
		$response = Cdn::getInstance()->request('SetBackOriginHostConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//设置refer防盗链 
	public function testSetReferProtectionConfig()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				'Enable' => 'on',   //
				'ReferType' => 'block',
				'ReferList' => 'www.baidu.com,www.sina.com',
				//'AllowEmpty' => '',  //默认 on
			],
		];
		$response = Cdn::getInstance()->request('SetReferProtectionConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//设置缓存策略 post
    public function testSetCacheRuleConfig()
	{
        $cache_rule = array(
            'DomainId' => '2D09RHK',
            'CacheRules' => array(
                array(
                    'CacheRuleType' => 'file_suffix',
                    'CacheTime' => 10,
                    'Value' => 'jpg',
                ),
                array(
                    'CacheRuleType' => 'directory',
                    'CacheTime' => 10,
                    'Value' => '/aaa/',
                ),
            ),
        );
        $data = json_encode($cache_rule);
		$params = [
			'body' => $data,
		];
		$response = Cdn::getInstance()->request('SetCacheRuleConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	
	//设置测试url
	public function testSetTestUrlConfig()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				'TestUrl' => 'www.qunar.com/index.html',   
			],
		];
		$response = Cdn::getInstance()->request('SetTestUrlConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//设置高级回源  post 传json
	public function testSetOriginAdvancedConfig()
	{
		$origin_variable = array(
            'DomainId' => '2D09RHK',
			'Enable' => 'on',
			'OriginPolicy' => 'quality',
			'OriginPolicyBestCount' => 1,
			'OriginType' => 'domain',
			'OriginAdvancedItems'=> array(
				array(
					'OriginLine' => 'default',
					'Origin' => 'www.b.qunar.com'
				),
				array(
					'OriginLine' => 'cm',
					'Origin' => 'www.c.qunar.com'
				),
			),
        );
		$data = json_encode($origin_variable);
		
		$params = [
			'body' => $data,
		];
		$response = Cdn::getInstance()->request('SetOriginAdvancedConfig', $params);
		return $this->assertEquals($response->getStatusCode(), 200);
	}
	
	//设置备注信息
	public function testSetRemarkConfig()
	{
		$params = [
			'query'=>[
				'DomainId' => '2D09QXK',
				'Remark' => '设置备注信息',   
			],
		];
		$response = Cdn::getInstance()->request('SetRemarkConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
    //*****统计分析*******//
    //查询带宽
    public function testGetBandwidthData()
	{
		$params = [
			'query'=>[
                'StartTime' => '2016-09-19T08:00+0800',
                'EndTime' => '2016-09-20T08:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
                'Regions' => 'CN',
                'DataType' => 'origin',
			],
		];
		$response = Cdn::getInstance()->request('GetBandwidthData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
    //查询流量
    public function testGetFlowData()
	{
		$params = [
			'query'=>[
                'StartTime' => '2016-09-19T08:00+0800',
                'EndTime' => '2016-09-20T08:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
                'Regions' => 'CN',
                'DataType' => 'edge',
			],
		];
		$response = Cdn::getInstance()->request('GetFlowData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
    //请求数查询
    public function testGetPvData()
	{
		$params = [
			'query'=>[
                'StartTime' => '2016-09-19T08:00+0800',
                'EndTime' => '2016-09-20T08:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
                'Regions' => 'CN',
                'DataType' => 'edge',
                'Granularity' => '5',
			],
		];
		$response = Cdn::getInstance()->request('GetPvData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
    //命中率详情查询
     public function testGetHitRateDetailedData()
	{
		$params = [
			'query'=>[
                'StartTime' => '2016-09-19T08:00+0800',
                'EndTime' => '2016-09-20T08:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
                'HitType' => 'flowhitrate',
			],
		];
		$response = Cdn::getInstance()->request('GetHitRateDetailedData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}  
	//命中率查询（饼图）
	public function testGetHitRateData()
	{
		$params = [
			'query' => [
				'CdnType' => 'download',
				'StartTime' => '2016-09-19T08:00+0800',
				'EndTime' => '2016-09-20T08:00+0800',
			],
		];
		$response = Cdn::getInstance()->request('GetHitRateData', $params);
		return $this->assertEquals($response->getStatusCode(), 200);
	}
	//省份+运营商流量查询
	public function testGetProvinceAndIspFlowData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-19T00:00+0800',
				'EndTime' => '2016-09-19T23:00+0800',
				'CdnType' => 'download',
				'ResultType' => '0',
			],
		];
		$response = Cdn::getInstance()->request('GetProvinceAndIspFlowData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//省份+运营商带宽查询
	public function testGetProvinceAndIspBandwidthData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-19T00:00+0800',
				'EndTime' => '2016-09-19T23:00+0800',
				'CdnType' => 'download',
				'ResultType' => '1',
				'Granularity' => '480',
			],
		];
		$response = Cdn::getInstance()->request('GetProvinceAndIspBandwidthData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//状态码统计
	public function testGetHttpCodeData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-19T00:00+0800',
				'EndTime' => '2016-09-19T23:00+0800',
				'CdnType' => 'download',
			],
		];
		$response = Cdn::getInstance()->request('GetHttpCodeData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//状态码详情统计
	public function testGetHttpCodeDetailedData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-19T00:00+0800',
				'EndTime' => '2016-09-19T23:00+0800',
				'CdnType' => 'download',
				'ResultType' => '0',
			],
		];
		$response = Cdn::getInstance()->request('GetHttpCodeDetailedData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//top url 查询
	public function testGetTopUrlData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-19T00:00+0800',
				'EndTime' => '2016-09-19T23:00+0800',
				'CdnType' => 'download',
				'LimitN' => '5',
			],
		];
		$response = Cdn::getInstance()->request('GetTopUrlData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//用户区域统计
	public function testGetAreaData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-19T00:00+0800',
				'EndTime' => '2016-09-19T23:00+0800',
				'CdnType' => 'download',
			],
		];
		$response = Cdn::getInstance()->request('GetAreaData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//运营商占比统计
	public function testGetIspData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-19T00:00+0800',
				'EndTime' => '2016-09-19T23:00+0800',
				'CdnType' => 'download',
			],
		];
		$response = Cdn::getInstance()->request('GetIspData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//直播按流维度查询流量
	public function testGetLiveFlowDataByStream()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-22T09:14+0800',
				'EndTime' => '2016-09-24T10:20+0800',
				'StreamUrl' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
				'ResultType' => '0',
				'Granularity' => '1440',
			],
		];
		$response = Cdn::getInstance()->request('GetLiveFlowDataByStream', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//直播按流维度查询带宽
	public function testGetLiveBandwidthDataByStream()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-22T09:14+0800',
				'EndTime' => '2016-09-24T10:20+0800',
				'StreamUrl' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
				'ResultType' => '1',
				'Granularity' => '1440',
			],
		];
		$response = Cdn::getInstance()->request('GetLiveBandwidthDataByStream', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//直播按域名维度统计在线人数
	public function testGetLiveOnlineUserDataByDomain()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-22T09:14+0800',
				'EndTime' => '2016-09-24T10:20+0800',
				'ResultType' => '0',
				'Granularity' => '1440',
			],
		];
		$response = Cdn::getInstance()->request('GetLiveOnlineUserDataByDomain', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//直播按流维度统计在线人数
	public function testGetLiveOnlineUserDataByStream()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-22T09:14+0800',
				'EndTime' => '2016-09-24T10:20+0800',
				'StreamUrl' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
				'ResultType' => '1',
				'Granularity' => '1440',
			],
		];
		$response = Cdn::getInstance()->request('GetLiveOnlineUserDataByStream', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	//直播TopN按流维度的在线人数排行
	public function testGetLiveTopOnlineUserData()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-09-22T09:14+0800',
				'EndTime' => '2016-09-24T10:20+0800',
				'LimitN' => '5',
			],
		];
		$response = Cdn::getInstance()->request('GetLiveTopOnlineUserData', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}

}





