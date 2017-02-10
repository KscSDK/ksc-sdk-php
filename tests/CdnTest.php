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
         //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
        $params = [
            'query'=>[
                'PageSize' => '20',  //分页大小
                'PageNumber' => '1', //取第几页
                'DomainName' => '',  //按域名过滤  默认为空，代表当前用户下所有域名
                'DomainStatus' => 'online', //按域名状态过滤
                'CdnType' => 'download', //产品类型
                'FuzzyMatch' => '', //域名过滤是否使用模糊匹配
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
                'DomainName' => 'www.le.com',     //加速域名
                'CdnType' => 'download',    //加速类型             
                'CdnProtocol' => 'http',    //客户访问边缘节点的协议。默认http
                'Regions' => 'CN', //加速区域，默认CN， 可以输入多个，以逗号间隔。
                'OriginType' => 'domain',   //源站类型
                'OriginProtocol' => 'http', //回源协议              
                'Origin' => 'www.ksyun.com',    //源站域名
                'OriginPort' => '80', //源站域名端口号              
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
                'DomainId' => '2D09NS4', //域名ID，只允许输入单个域名ID
            ],
        ];
        $response = Cdn::getInstance()->request('GetCdnDomainBasic', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    /**
    *   修改域名基本配置
    *   request($api, $httpConfig)提交请求
    *       $api 为  'ModifyCdnDomain'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testModifyCdnDomain()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NS4', //待更新的域名id
                'Origin' => 'www.ks-cdn.com', //源站域名
                'OriginType' => 'domain', //源站类型
                'OriginPort' => '80', //源站域名端口号
                //'Regions' => '', //加速区域，默认CN
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
                'DomainId' => '2D09NS4', //域名id
                'ActionType' => 'start', //操作接口名  start：启用；stop：停用；
            ],
        ];
        $response = Cdn::getInstance()->request('StartStopCdnDomain', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    //删除域名,没有测试案例

    /**
    *   获取指定加速域名的详细配置
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetDomainConfigs'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetDomainConfigs()
    {
        /*ConfigList参数说明
            cache_expired    缓存策略
            cc               IP防盗链配置
            error_page       自定义404错误页面跳转，当前不支持
            http_header      设置http头
            optimize         页面优化，当前不支持
            page_compress    智能压缩
            ignore_query_string  过滤参数
            range            设置range回源
            referer          Refer防盗链功能
            req_auth         设置URL鉴权
            src_host         设置回源host
            video_seek       设置拖拽
            waf              Waf防护功能，当前不支持
            notify_url       视频直播notify url ，当前不支持
            redirect_type    强制访问跳转方式, 取值: Off, Http, Https，当前不支持
            src_advanced     设置高级回源
            src_probe        设置回源探测
            test_url         设置测试URL
        */
        $params = [
            'query'=>[
                'DomainId' => '2D09NS4', //域名id
                'ConfigList' => 'cache_expired,ignore_query_string,src_host,referer,test_url,src_advanced',   //查某几项配置,不填代表查询所有
            ],
        ];
        $response = Cdn::getInstance()->request('GetDomainConfigs', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    /**
    *   设置过滤参数功能  开启或者关闭
    *   request($api, $httpConfig)提交请求
    *       $api 为  'SetIgnoreQueryStringConfig'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testSetIgnoreQueryStringConfig()
    {
        $params = [
            'query'=>[
                'DomainId' => '2D09NS4', //域名ID
                'Enable' => 'on',   //  过滤参数功能的开启或关闭 on、off ，默认为on
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
                'DomainId' => '2D09NS4',  //域名ID
                'BackOriginHost' => 'www.a.le.com',   //自定义回源域名，默认为空，表示不需要修改回源Host
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
                'DomainId' => '2D09NS4', //待设置域名id
                'Enable' => 'on',   //打开配置
                'ReferType' => 'block', ////设置refer类型 block：黑名单；allow：白名单
                'ReferList' => 'www.baidu.com,www.sina.com', //逗号隔开的域名列表
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
        //设置缓存规则 json格式  缓存规则类型有 file_suffix 文件后缀 directory 目录 exact 全路径 url_regex 正则表达式
        $cache_rule = array(
            'DomainId' => '2D09NS4', //域名ID
            'CacheRules' => array(
                array(
                        'CacheRuleType' => 'file_suffix',  //缓存规则类型  文件后缀
                        'CacheTime' => 10, //缓存时间
                        'Value' => 'jpg', //缓存规则的内容
                ),
                array(
                        'CacheRuleType' => 'directory', //缓存规则类型 目录
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
                'DomainId' => '2D09NS4', //域名ID
                'TestUrl' => 'www.le.com/index.html', //测试URL列表，逗号间隔
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
        //开启高级回源策略后，会关闭掉基础配置中的回源配置 ，使用json格式
        $origin_variable = array(
            'DomainId' => '2D09NS4', //待设置域名id
            'Enable' => 'on', //打开配置
            'OriginPolicy' => 'quality', //设置回源策略 rr: 轮询； quality: 按质量最优的topN来轮询回源
            'OriginPolicyBestCount' => 1, //当OriginPolicy是quality时，该项必填。取值1-10
            'OriginType' => 'domain', //设置源站类型
            'OriginAdvancedItems'=> array(   //源站信息
                array(
                    'OriginLine' => 'default', //设置回源地址
                    'Origin' => 'www.b.le.com' //设置源站线路
                ),
                array(
                    'OriginLine' => 'cm',
                    'Origin' => 'www.c.le.com'
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
                'DomainId' => '2D09NS4', //域名ID
                'Remark' => '设置备注信息', //备注信息，默认为空
            ],
        ];
        $response = Cdn::getInstance()->request('SetRemarkConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    //*****以下为统计分析API调用方式*******//
    
    /**
    * 带宽查询
    * 获取域名带宽数据，包括边缘带宽、回源带宽数据，单位：bit/second
    * 支持按指定的起止时间查询，两者需要同时指定
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔
    * 最多可获取最近一年内93天跨度的数据
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；以上粒度的带宽值均取该粒度时间段的峰值
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetBandwidthData'
    *       $httpConfig 中通过query字段设置请求参数
    */ 
    public function testGetBandwidthData()
    {
        $params = [
            'query'=>[
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
                'StartTime' => '2016-11-19T08:00+0800', //查询开始时间
                'EndTime' => '2016-11-20T08:00+0800', //查询结束时间
                'Granularity'=>'240', //统计粒度，取值为 5（默认）：5分钟粒度
                'CdnType' => 'download', //加速类型 download:下载类加速,；live:直播加速
                'ResultType' => '0', //带宽数据返回类型  0：多域名多区域数据做合并；1：每个域名每个区域的数据分别返回
                'Regions' => 'CN', //查询区域
                'DataType' => 'origin', //数据类型,边缘或者回源 edge:边缘数据; origin:回源数据
            ],
        ];
        $response = Cdn::getInstance()->request('GetBandwidthData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    /**
    * 流量查询
    * 获取域名流量数据，包括边缘流量、回源流量数据， 单位：byte
    * 支持按指定的起止时间查询，两者需要同时指定
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔
    * 最多可获取最近一年内93天跨度的数据
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；以上粒度均取该粒度时间段的流量之和
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetFlowData'
    *       $httpConfig 中通过query字段设置请求参数
    */ 
    public function testGetFlowData()
    {
        $params = [
            'query'=>[
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
                'StartTime' => '2016-11-19T08:00+0800', //查询开始时间
                'EndTime' => '2016-11-20T08:00+0800', //查询结束时间
                'Granularity'=>'240', //统计粒度，取值为 5（默认）：5分钟粒度
                'CdnType' => 'download', //加速类型 download:下载类加速,；live:直播加速
                'ResultType' => '0', //带宽数据返回类型  0：多域名多区域数据做合并；1：每个域名每个区域的数据分别返回
                'Regions' => 'CN', //查询区域
                'DataType' => 'edge', //数据类型,边缘或者回源 edge:边缘数据; origin:回源数据
            ],
        ];
        $response = Cdn::getInstance()->request('GetFlowData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    /**
    * 请求数查询
    * 获取域名请求数数据，包括边缘请求数、回源请求数， 单位：次
    * 支持按指定的起止时间查询，两者需要同时指定
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔
    * 支持多区域查询，多个区域用逗号（半角）分隔
    * 最多可获取最近三年内93天跨度的数据
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；以上粒度均取该粒度时间段的请求数之和
    *
    * 说明：
    * 请求数 ：统计当前域名下资源文件的访问次数
    *
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetPvData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetPvData()
    {
        $params = [
            'query'=>[
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
                'StartTime' => '2016-11-19T08:00+0800',
                'EndTime' => '2016-11-20T08:00+0800',
                'Granularity'=>'240', //统计粒度，取值为 5（默认）：5分钟粒度
                'CdnType' => 'download',
                'ResultType' => '0',
                'Regions' => 'CN',
                'DataType' => 'edge',
                'Granularity' => '5', //统计粒度 取值为 5（默认）：5分钟粒度；10：10分钟粒度；20：20分钟粒度；60：1小时粒度；
                                      //240：4小时粒度；480：8小时粒度；1440：1天粒度；以上粒度均取该粒度时间段的请求数总和
            ],
        ];
        $response = Cdn::getInstance()->request('GetPvData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
    
    /**
    *   命中率详情查询，获取域名流量命中率、请求数命中率数据，单位：百分比
    * 获取域名流量命中率、请求数命中率数据，单位：百分比
    * 支持按指定的起止时间查询，两者需要同时指定
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔
    * 最多可获取最近三年内93天跨度的数据
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；
    * 时效性：5分钟延迟
    *
    * 说明:
    * 请求数命中率=[1-回源请求数\/边缘请求数]*100%
    * 流量命中率=[1-回源流量\/边缘流量]*100%
    * 当边缘请求数或边缘流量为0时，命中率为0
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHitRateDetailedData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHitRateDetailedData()
    {
        $params = [
            'query'=>[
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
                'StartTime' => '2016-11-19T08:00+0800',
                'EndTime' => '2016-11-20T08:00+0800',
                'Granularity'=>'240', //统计粒度，取值为 5（默认）：5分钟粒度
                'CdnType' => 'download',
                'ResultType' => '0',
                'HitType' => 'flowhitrate', //数据类型,按流量或者请求数统计 flowhitrate:流量命中率;reqhitrate:请求数命中率;
            ],
        ];
        $response = Cdn::getInstance()->request('GetHitRateDetailedData', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }  

    /**
    *   命中率查询（饼图），获取域名某一时间段内流量命中率、请求数命中率数据，用于绘制命中率饼图。
    * 获取域名某一时间段内流量命中率、请求数命中率数据
    * 支持按指定的起止时间查询，两者需要同时指定
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔
    * 最多可获取最近一年内93天跨度的数据
    * 说明
    * Hit访问次数=边缘请求数-回源请求数
    * Miss访问次数=回源请求数
    * Hit访问流量=边缘流量-回源流量
    * Miss访问流量=回源流量
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHitRateData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHitRateData()
    {
        $params = [
            'query' => [
                //'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
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
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 最多可获取最近三年内93天跨度的数据<p>
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；**以上粒度均取该粒度时间段的流量之和**<p>
    * 使用场景<p>
    * 客户查询单个域名或多个域名在各个省份及运营商的合并后的实时流量数据<p>
    * 客户查询单个域名的详细流量数据，进行数据保存及数据分析<p>
    * 客户查询某一天或某1小时的详细流量区域分布，用于制作流量数据区域用量表<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetProvinceAndIspFlowData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetProvinceAndIspFlowData()
    {
        $params = [
            'query' => [
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
                //'Provinces'=>'', //省份区域名称 多个省份区域用逗号（半角）分隔，缺省为全部省份区域
                //'Isps'=>'', //运营商名称 多个运营商用逗号（半角）分隔，缺省为全部运营商
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'Granularity'=>'240', //统计粒度，取值为 5（默认）：5分钟粒度
                'CdnType' => 'download',
                'ResultType' => '0',
            ],
        ];
        $response = Cdn::getInstance()->request('GetProvinceAndIspFlowData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   省份+运营商带宽查询，获取域名在中国大陆地区各省市及各运营商的带宽数据，仅包括边缘节点数据，单位:bit/second
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 最多可获取最近三年内93天跨度的数据<p>
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；**以上粒度均取该粒度时间段的流量之和**<p>
    * 使用场景<p>
    * 客户查询单个域名或多个域名在各个省份及运营商的合并后的实时流量数据<p>
    * 客户查询单个域名的详细流量数据，进行数据保存及数据分析<p>
    * 客户查询某一天或某1小时的详细流量区域分布，用于制作流量数据区域用量表<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetProvinceAndIspBandwidthData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetProvinceAndIspBandwidthData()
    {
        $params = [
            'query' => [
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
                //'Provinces'=>'', //省份区域名称 多个省份区域用逗号（半角）分隔，缺省为全部省份区域
                //'Isps'=>'', //运营商名称 多个运营商用逗号（半角）分隔，缺省为全部运营商                
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'Granularity' => '480',                
                'CdnType' => 'download',
                'ResultType' => '1',

            ],
        ];
        $response = Cdn::getInstance()->request('GetProvinceAndIspBandwidthData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   状态码统计，获取域名一段时间内的Http状态码访问次数及占比数据,用于绘制饼图
    * 客户查询单个域名或多个域名一段时间内各状态码访问次数<p>
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 最多可获取最近三年内93天跨度的数据<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHttpCodeData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHttpCodeData()
    {
        $params = [
            'query' => [
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
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
    * 客户查询单个域名或多个域名各状态码详细访问数据<p>
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 最多可获取最近一年内93天跨度的数据<p>
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度，以上统计粒度均取该粒度内各状态码的访问次数之和<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetHttpCodeDetailedData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetHttpCodeDetailedData()
    {
        $params = [
            'query' => [
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'Granularity'=>'240', //统计粒度，取值为 5（默认）：5分钟粒度
                'CdnType' => 'download',
                'ResultType' => '0', //返回类型为合并返回
            ],
        ];
        $response = Cdn::getInstance()->request('GetHttpCodeDetailedData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    * top url 查询
    * 获取单个域名或多个域名某天内某一时段的TOP Url访问数据，仅包含Top200且访问次数大于15次的 Url的访问次数、访问流量，并按次数排序<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 最多可获取最近一年内一天跨度的数据<p>
    * 时效性：30分钟延迟<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetTopUrlData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetTopUrlData()
    {
        $params = [
            'query' => [
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
                'LimitN' => '5',  //热门Url条数
            ],
        ];
        $response = Cdn::getInstance()->request('GetTopUrlData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   用户区域统计
    * 获取国内各省份及运营商流量、访问次数、流量占比，请求数占比，海外地区的流量、访问次数、流量占比、请求数占比。<p>
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 最多可获取最近一年内93天跨度的数据<p>
    * 说明<p>
    * 运营商包含：电信、联通、移动、铁通、鹏博士、教育网、其他、海外ISP<p>
    * 地区包含：国内32个省、香港、台湾、澳门、其他海外地区统一合并为海外<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetAreaData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetAreaData()
    {
        $params = [
            'query' => [
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
            ],
        ];
        $response = Cdn::getInstance()->request('GetAreaData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   运营商占比统计
    * 获取各运营商流量、访问次数、流量占比、访问次数占比<p>
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 最多可获取最近一年内93天跨度的数据<p>
    * 说明
    * 运营商包含：电信、联通、移动、铁通、鹏博士、教育网、其他、海外ISP<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetIspData'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetIspData()
    {
        $params = [
            'query' => [
                'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
                'StartTime' => '2016-11-19T00:00+0800',
                'EndTime' => '2016-11-19T23:00+0800',
                'CdnType' => 'download',
            ],
        ];
        $response = Cdn::getInstance()->request('GetIspData', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   直播按流维度查询流量
    * 直播业务，获取按流为维度的流量数据<P>
    * 支持按指定的起止时间查询，两者需要同时指定<P>
    * 支持批量流名过滤查询，多个流名用逗号（半角）分隔<P>
    * 最多可获取最近62天内，7天跨度的数据<P>
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；以上粒度均取该粒度时间段的求和<P>
    * 只支持直播业务<P>
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
                'StreamUrls' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092', //流名，支持批量查询，多个流名用逗号（半角）分隔
                'Regions'=>'CN', //计费区域名称 多个区域用逗号（半角）分隔，缺省为 CN
                'ResultType' => '0',
                'Granularity' => '1440',
            ],
        ];
        $response = Cdn::getInstance()->request('GetLiveFlowDataByStream', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   直播按流维度查询带宽
    * 直播业务，获取按流为维度的带宽数据，带宽单位bit\/second<p>
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量流名过滤查询，多个流名用逗号（半角）分隔<p>
    * 最多可获取最近62天内，7天跨度的数据<p>
    * 统计粒度：5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；以上粒度的带宽值均取该粒度时间段的峰值<p>
    * 只支持直播业务<p>
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
                'StreamUrls' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
                'Regions'=>'CN', //计费区域名称 多个区域用逗号（半角）分隔，缺省为 CN
                'ResultType' => '1',
                'Granularity' => '1440',
            ],
        ];
        $response = Cdn::getInstance()->request('GetLiveBandwidthDataByStream', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    *   直播按域名维度统计在线人数
    * 获取按域名维度的直播在线人数数据， 单位：每分钟的在线人数<p>
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量域名查询，多个域名ID用逗号（半角）分隔<p>
    * 支持多计费区域查询，多个计费区域用逗号（半角）分隔<p>
    * 最多可获取最近1年93天跨度的数据<p>
    * 统计粒度：1分钟粒度（默认）；5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；以上粒度均取该粒度时间段的在线人数的**峰值。<p>
    * 只支持直播业务<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetLiveOnlineUserDataByDomain'
    *       $httpConfig 中通过query字段设置请求参数
    */
	public function testGetLiveOnlineUserDataByDomain()
	{
		$params = [
			'query' => [
                //'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
                'Regions'=>'CN', //计费区域名称 多个区域用逗号（半角）分隔，缺省为 CN
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
    *   直播按流维度统计在线人数
    * 获取按流维度的直播在线人数数据， 单位：每分钟的在线人数<p>
    * 支持按指定的起止时间查询，两者需要同时指定<p>
    * 支持批量流名过滤查询，多个流名用逗号（半角）分隔<p>
    * 支持多计费区域查询，多个计费区域用逗号（半角）分隔<p>
    * 最多可获取最近62天内，7天跨度的数据。（注意： 按流名维度的数据，只保留2个月）<p>
    * 统计粒度：1分钟粒度；5分钟粒度；10分钟粒度；20分钟粒度；1小时粒度；4小时粒度；8小时粒度；1天粒度；以上粒度的在线人数均取该粒度时间段的在线人数的峰值 (注意： 需要按统计粒度来汇聚，用于在界面上展示。)<p>
    * 说明:<p>
    * 按流名维度的数据，返回时并不按照“域名”维度汇聚。如果需要按域名维度的数据，请按单个域名过滤<p>
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
                'StreamUrls' => 'rtmp://realflv3.plu.cn/live/ffea40ea2f8e4a5e95096e0f89227092',
                'Regions'=>'CN', //计费区域名称 多个区域用逗号（半角）分隔，缺省为 CN
                'ResultType' => '1',
                'Granularity' => '1440',
            ],
        ];
        $response = Cdn::getInstance()->request('GetLiveOnlineUserDataByStream', $params);
        return $this->assertEquals($response->getStatuscode(), 200);
    }
	
    /**
    * 获取按流维度的直播在线人数排行， 单位：每分钟的在线人数<p>
    * 只设置起始时间，代表起始时间这1分钟的数据。<p>
    * 支持批量域名过滤查询，多个域名ID用逗号（半角）分隔<p>
    * 支持多计费区域查询，多个计费区域用逗号（半角）分隔<p>
    * 最多可获取最近62天内的数据。（注意： 按流维度的数据，只保留2个月）<p>
    * 说明：<p>
    * 按流名维度的数据，返回时并不按照“域名”维度汇聚。如果需要按域名维度的数据，请按单个域名过滤<p>
    *   request($api, $httpConfig)提交请求
    *       $api 为  'GetLiveOnlineUserDataByStream'
    *       $httpConfig 中通过query字段设置请求参数
    */
    public function testGetLiveTopOnlineUserData()
    {
        $params = [
            'query' => [
                'StartTime' => '2016-11-22T09:14+0800',
                //'DomainIds'=>'2D09NS4', //域名ID，支持批量域名过滤查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
                'Regions'=>'CN', //计费区域名称 多个区域用逗号（半角）分隔，缺省为 CN
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
                    'domain' => 'test.dxz.ksyun.8686c.com', //要下载的域名
                    'startTime' => '', // 日志创建的开始时间（时间戳，以毫秒为单位）（可选，默认为32天前）
                    'endTime' => '', //结束时间（时间戳，以毫秒为单位）（可选，默认为当前时间）
                    'pageIndex' => '', //页码（可选，默认为0）
                    'pageSize' => '', //每页大小（可选，默认为10）
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
    public function testGetQuotaConfig()
    {
        $params = [
            'query' => [],
        ];
        $response = Cdn::getInstance()->request('GetQuotaConfig', $params);
        //echo (string)$response->getBody();
        return $this->assertEquals($response->getStatuscode(), 200);
    }
  
    /**
    *   查询当前配额使用量
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
                'StartTime'=>'1480476366935', //查询开始时间
                'EndTime'=>'1480694340000', //查询结束时间
                'PageIndex'=>'0', //页码,从0开始
                'PageSize'=>'10', //每页大小
                'Type'=>'refreshFile', //查询类型, refreshFile:刷新文件  refreshDir:刷新目录 preloadFile：预加载
                //'QueryName'=>'', //支持模糊查询,查询条件
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
        //需要刷新的文件 json格式
        $content = array(
            'callerReference' => '',
            'files' => array(
                        'http://www.le.com/2.html',   //需要刷新的文件,为具体url   数组
                    ),
             'dirs'=> array(
                        'http://www.le.com/2/',    //需要刷新的目录以/结尾    数组
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
                'http://www.le.com/1.html',
                'http://appinstall2.ks3-cn-beijing.ksyun.com/2.html',
                'http://www.le.com/2.html',
        );
        $params = [
                'files' => $files,   ////需要预加载的文件  数组
        ];
        Cdn::getInstance()->request('PreloadCache', $params); //无返回
        //return $this->assertEquals($response->getStatuscode(), 200);
    }
}





