<?php
namespace Ksyun\Tests;
use Ksyun\Service\Cdn;

/**
*CdnTest
*Cdn sdk api测试类，用户可参考相应api的测试案例使用
*
*Cdn::getInstance()->request($api, array $httpConfig = [])
*
*   使用上述方法对CDN API接口进行HTTP调用，其中参数含义为：
*   $api            选择要使用的API
*   $httpConfig     HTTP请求参数的封装;
*                   'query'封装get方法提交的参数
*                   'body'封装post方法提交的http body
*/

class CdnTest extends \PHPUnit_Framework_TestCase
{
    /**
    *查询域名列表
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetCdnDomains'
    *       $httpConfig 中通过query字段设置请求参数
    */
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
    /**
    *   新增域名
    *   request($api, $httpConfig)提交请求
    *       $api 为  'AddCdnDomain'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testAddCdnDomain()
    {
        $params = [
            'query'=>[
                'DomainName' => 'www.cnnic.cn',
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
    /**
    *   查询域名基础信息
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetCdnDomainBasic'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetCdnDomainBasic()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
            ],
        ];
        $response = Cdn::getInstance()->request('GetCdnDomainBasic', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    /**
    *   修改域名配置
    *   request($api, $httpConfig)提交请求
    *       $api 为  'ModifyCdnDomain'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testModifyCdnDomain()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                'Origin' => 'www.ks-cdn.com',
                'OriginType' => 'domain',
                'OriginPort' => '80',
                //'Regions' => '',
            ],
        ];
        $response = Cdn::getInstance()->request('ModifyCdnDomain', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    /**
    *   本接口用于启用、停用某个加速域名
    *   request($api, $httpConfig)提交请求
    *       $api 为  'StartStopCdnDomain'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testStartStopCdnDomain()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                'ActionType' => 'start',
            ],
        ];
        $response = Cdn::getInstance()->request('StartStopCdnDomain', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    //删除域名,没有测试案例

    /**
    *   获取指定加速域名的配置
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetDomainConfigs'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetDomainConfigs()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                //'ConfigList' => 'cache_expired,cc,ignore_query_string',   //过滤规则
            ],
        ];
        $response = Cdn::getInstance()->request('GetDomainConfigs', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    /**
    *   设置过滤参数功能
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetIgnoreQueryStringConfig'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testSetIgnoreQueryStringConfig()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                'Enable' => 'on',   //  on  或者 off
            ],
        ];
        $response = Cdn::getInstance()->request('SetIgnoreQueryStringConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    /**
    *   设置回源host功能
    *   注意： 若源站为KS3域名，需将ks3域名设置为回源host（即源站域名），方可正常回源
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetBackOriginHostConfig'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testSetBackOriginHostConfig()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                'BackOriginHost' => 'www.a.qunar.com',   //
            ],
        ];
        $response = Cdn::getInstance()->request('SetBackOriginHostConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    /**
    *   设置加速域名的Refer防盗链功能，加速域名创建后，默认不开启refer防盗链功能
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetReferProtectionConfig'
    *       $httpConfig 中通过query字段设置请求参数
    */ 
    public function testSetReferProtectionConfig()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                'Enable' => 'on',   //
                'ReferType' => 'block',
                'ReferList' => 'www.baidu.com,www.sina.com',
                //'AllowEmpty' => '',  //默认 on
            ],
        ];
        $response = Cdn::getInstance()->request('SetReferProtectionConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    /**
    *   设置缓存规则。加速域名创建后，默认缓存规则为空
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetCacheRuleConfig'
    *       $httpConfig 中通过body字段设置提交的json格式缓存规则
    */ 
    public function testSetCacheRuleConfig()
    {
        $cache_rule = array(
            'DomainId' => '2D09NXG',
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
    /**
    *   设置加速域名的测试URL
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetTestUrlConfig'
    *       $httpConfig 中通过query字段设置请求参数
    */ 
    public function testSetTestUrlConfig()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                'TestUrl' => 'www.qunar.com/index.html',   
            ],
        ];
        $response = Cdn::getInstance()->request('SetTestUrlConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    /**
    *   设置高级回源策略。
    *   注意：
    *   OriginLine为default默认源的线路，是必填项，其他几个源都是选填项。OriginLine不能
    *   重复填写。
    *    开启高级回源策略后，会关闭掉基础配置中的回源配置。
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetOriginAdvancedConfig'
    *       $httpConfig 中通过body字段设置提交的json格式缓存规则
    */ 
    public function testSetOriginAdvancedConfig()
    {
        $origin_variable = array(
            'DomainId' => '2D09NXG',
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
	
    /**
    *   设置备注信息
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetRemarkConfig'
    *       $httpConfig 中通过query字段设置请求参数
    */ 
    public function testSetRemarkConfig()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NXG',
                'Remark' => '设置备注信息',   
            ],
        ];
        $response = Cdn::getInstance()->request('SetRemarkConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    //*****以下为统计分析API调用方式*******//
    
    /**
    *   获取域名带宽数据，包括边缘带宽、回源带宽数据，单位：bit/second
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetBandwidthData'
    *       $httpConfig 中通过query字段设置请求参数
    */ 
    public function testGetBandwidthData()
    {
        $params = [
            'query'=>[
                'StartTime' => '2016-11-19T08:00+0800',
                'EndTime' => '2016-11-20T08:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
                'Regions' => 'CN',
                'DataType' => 'origin',
            ],
        ];
        $response = Cdn::getInstance()->request('GetBandwidthData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    /**
    *   获取域名流量数据，包括边缘流量、回源流量数据， 单位：byte
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetFlowData'
    *       $httpConfig 中通过query字段设置请求参数
    */ 
    public function testGetFlowData()
    {
        $params = [
            'query'=>[
                'StartTime' => '2016-11-19T08:00+0800',
                'EndTime' => '2016-11-20T08:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
                'Regions' => 'CN',
                'DataType' => 'edge',
            ],
        ];
        $response = Cdn::getInstance()->request('GetFlowData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    /**
    *   获取域名请求数数据，包括边缘请求数、回源请求数， 单位：次
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetPvData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetPvData()
    {
        $params = [
            'query'=>[
                'StartTime' => '2016-11-19T08:00+0800',
                'EndTime' => '2016-11-20T08:00+0800',
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
    
    /**
    *   命中率详情查询，获取域名流量命中率、请求数命中率数据，单位：百分比
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHitRateDetailedData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHitRateDetailedData()
    {
        $params = [
            'query'=>[
                'StartTime' => '2016-11-19T08:00+0800',
                'EndTime' => '2016-11-20T08:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
                'HitType' => 'flowhitrate',
            ],
        ];
        $response = Cdn::getInstance()->request('GetHitRateDetailedData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }  

    /**
    *   命中率查询（饼图），获取域名某一时间段内流量命中率、请求数命中率数据，用于绘制命中率饼图。
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHitRateData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHitRateData()
    {
        $params = [
            'query' => [
                'CdnType' => 'download',
                'StartTime' => '2016-11-19T08:00+0800',
                'EndTime' => '2016-11-20T08:00+0800',
            ],
        ];
        $response = Cdn::getInstance()->request('GetHitRateData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    /**
    *   省份+运营商流量查询，获取域名在中国大陆地区各省份及各运营商的流量数据，仅包括边缘节点数据，单位:byte
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetProvinceAndIspFlowData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetProvinceAndIspFlowData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
            ],
        ];
        $response = Cdn::getInstance()->request('GetProvinceAndIspFlowData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   省份+运营商带宽查询，获取域名在中国大陆地区各省市及各运营商的带宽数据，仅包括边缘节点数据，单位:bit/second
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetProvinceAndIspBandwidthData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetProvinceAndIspBandwidthData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
                'ResultType' => '1',
                'Granularity' => '480',
            ],
        ];
        $response = Cdn::getInstance()->request('GetProvinceAndIspBandwidthData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   状态码统计，获取域名一段时间内的Http状态码访问次数及占比数据,用于绘制饼图
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHttpCodeData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHttpCodeData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
            ],
        ];
        $response = Cdn::getInstance()->request('GetHttpCodeData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   状态码详情统计，获取域名的Http状态码详细访问次数及占比数据
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHttpCodeDetailedData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHttpCodeDetailedData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
                'ResultType' => '0',
            ],
        ];
        $response = Cdn::getInstance()->request('GetHttpCodeDetailedData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   top url 查询，获取单个域名或多个域名某天内某一时段的TOP Url访问数据，仅包含Top200且访问次数大于5次的 Url的访问次数、
    *   访问流量，并按次数排序
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetTopUrlData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetTopUrlData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
                'LimitN' => '5',
            ],
        ];
        $response = Cdn::getInstance()->request('GetTopUrlData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   用户区域统计，获取国内各省份及运营商流量、访问次数、流量占比，请求数占比，海外地区的流量、访问
    *   次数、流量占比、请求数占比。
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetAreaData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetAreaData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
            ],
        ];
        $response = Cdn::getInstance()->request('GetAreaData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   运营商占比统计，获取各运营商流量、访问次数、流量占比、访问次数占比
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetIspData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetIspData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
            ],
        ];
        $response = Cdn::getInstance()->request('GetIspData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   直播按流维度查询流量，直播业务，获取按流为维度的流量数据，流量单位byte
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetLiveFlowDataByStream'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetLiveFlowDataByStream()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-22T09:14+0800',
                'EndTime' => '2016-11-24T10:20+0800',
                'StreamUrl' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
                'ResultType' => '0',
                'Granularity' => '1440',
            ],
        ];
        $response = Cdn::getInstance()->request('GetLiveFlowDataByStream', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   直播按流维度查询带宽，直播业务，获取按流为维度的带宽数据，带宽单位bit/second
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetLiveBandwidthDataByStream'
    *       $httpConfig 中通过query字段设置请求参数
    */    
    public function testGetLiveBandwidthDataByStream()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-22T09:14+0800',
                'EndTime' => '2016-11-24T10:20+0800',
                'StreamUrl' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
                'ResultType' => '1',
                'Granularity' => '1440',
            ],
        ];
        $response = Cdn::getInstance()->request('GetLiveBandwidthDataByStream', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   直播按域名维度统计在线人数，获取按域名维度的直播在线人数数据， 单位：每分钟的在线人数
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetLiveOnlineUserDataByDomain'
    *       $httpConfig 中通过query字段设置请求参数
    */
	public function testGetLiveOnlineUserDataByDomain()
	{
		$params = [
			'query' => [
				'StartTime' => '2016-11-22T09:14+0800',
				'EndTime' => '2016-11-24T10:20+0800',
				'ResultType' => '0',
				'Granularity' => '1440',
			],
		];
		$response = Cdn::getInstance()->request('GetLiveOnlineUserDataByDomain', $params);
		return $this->assertEquals($response->getStatuscode(), 200);
	}
	
    /**
    *   直播按流维度统计在线人数，获取按流维度的直播在线人数数据， 单位：每分钟的在线人数
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetLiveOnlineUserDataByStream'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetLiveOnlineUserDataByStream()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-22T09:14+0800',
                'EndTime' => '2016-11-24T10:20+0800',
                'StreamUrl' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
                'ResultType' => '1',
                'Granularity' => '1440',
            ],
        ];
        $response = Cdn::getInstance()->request('GetLiveOnlineUserDataByStream', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   直播按流维度统计在线人数，获取按流维度的直播在线人数数据， 单位：每分钟的在线人数
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetLiveOnlineUserDataByStream'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetLiveTopOnlineUserData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-22T09:14+0800',
                'EndTime' => '2016-11-24T10:20+0800',
                'ResultType'=>'0',
                'LimitN' => '5',
            ],
        ];
        $response = Cdn::getInstance()->request('GetLiveTopOnlineUserData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
    //以下是内容管理接口
    
    /**
    *   日志下载接口
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetDomainLogs'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testDownloadLog()
    {
        $params = [
                'query' => [
                    'domain' => 'test.dxz.ksyun.8686c.com',
                    'startTime' => '',
                    'endTime' => '',
                    'pageIndex' => '',
                    'pageSize' => '',
                ],
        ];
        $response = Cdn::getInstance()->request('GetDomainLogs', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
   
    /**
    *   查询当前配额
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetQuotaConfig'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testgetQuotaConfig()
    {
        $params = [
            'query' => [],
        ];
        $response = Cdn::getInstance()->request('GetQuotaConfig', $params);
        //echo (string)$response->getBody();
        return $this->assertEquals($response->getStatuscode(), 200);
    }
  
    /**
    *   获取当前已用配额用量
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetQuotaUsageAmount'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetQuotaUsageAmount()
    {
        $params = [
                'query' => [],
        ];
        $response = Cdn::getInstance()->request('GetQuotaUsageAmount', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
   
    /**
    *   查询刷新及预加载结果
    *   request($api, $httpConfig)提交请求
    *       $api 为  'ListInvalidationsByContentPath'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testListInvalidationsByContentPath()
    {
        $params = [
            'query' => [
                'StartTime'=>'1480476366935',
                'EndTime'=>'1480694340000',
                'PageIndex'=>'0',
                'PageSize'=>'10',
                'Type'=>'refreshFile',
            ],
        ];
        $response = Cdn::getInstance()->request('ListInvalidationsByContentPath', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }

    /**
    *   刷新  刷新节点上的文件内容。刷新指定URL内容至Cache节点，支持URL、目录批量刷新
    *   request($api, $httpConfig)提交请求
    *       $api 为  'RefreshCaches'
    *       $httpConfig 中通过body字段设置提交的json格式数据
    */
    public function testRefreshCaches()
    {
        $content = array(
            'callerReference' => '',
            'files' => array(
                        'http://www.cnic.cn/2.html',
                    ),
             'dirs'=> array(
                        'http://www.cnic.cn/2/',
                    ),
        );
        $data = json_encode($content);
        $params = [
                'body' => $data,
        ];
        $response = Cdn::getInstance()->request('RefreshCaches', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
    
    /**
    *   预热  将源站的内容主动预热到Cache节点上，用户首次访问可直接命中缓存，缓解源站压力。
    *   request($api, $httpConfig)提交请求
    *       $api 为  'PreloadCache'
    *       $httpConfig 中通过files字段设置预热的文件，sdk将文件数组封装为xml文件
    */
    public function testPreloadCache()
    {
        $files = array(
                'http://appinstall2.ks3-cn-beijing.ksyun.com/l.html',
                'http://www.cnic.cn/1.html',
                'http://appinstall2.ks3-cn-beijing.ksyun.com/2.html',
                'http://www.cnic.cn/2.html',
        );
        $params = [
                'files' => $files,
        ];
        Cdn::getInstance()->request('PreloadCache', $params); //无返回
        //return $this->assertEquals($response->getStatuscode(), 200);
    }
}





