<?php
namespace Ksyun\Tests;
require('../vendor/autoload.php');
use Ksyun\Service\Cdn;

$ak = "your ak";
$sk = "your sk";

function testGetCdnDomains()
{
    global $ak;
    global $sk;
     //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query'=>[
            'PageSize' => '20',  //分页大小
            'PageNumber' => '1', //取第几页
            'DomainName' => '',  //按域名过滤  默认为空，代表当前用户下所有域名
            'DomainStatus' => 'online', //按域名状态过滤
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载 live:直播类型
            'FuzzyMatch' => '', //域名过滤是否使用模糊匹配
        ]
    ];
    $response = Cdn::getInstance()->request('GetCdnDomains', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testAddCdnDomain()
{
    global $ak;
    global $sk;
    //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainName' => 'www.le.com',     //加速域名,可输入泛域名*.le.com
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'CdnProtocol' => 'http',    //客户访问边缘节点的协议。默认http
            'Regions' => 'CN', //加速区域，默认CN， 可以输入多个，以逗号间隔。
            'OriginType' => 'domain',   //源站类型
            'OriginProtocol' => 'http', //回源协议
            'Origin' => 'www.ksyun.com',    //源站域名
            'OriginPort' => '80', //源站域名端口号
            'SearchUrl' => 'www.le.backsource.com/test.html',//泛域名时，必输,非泛域名时填写无效
        ],
    ];
    $response = Cdn::getInstance()->request('AddCdnDomain', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetBandwidthData()
{
    global $ak;
    global $sk;
    //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
            'StartTime' => '2016-11-19T08:00+0800', //查询开始时间
            'EndTime' => '2016-11-20T08:00+0800', //查询结束时间
            'Granularity' => '240', //统计粒度，取值为 5（默认）：5分钟粒度
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0', //带宽数据返回类型  0：多域名多区域数据做合并；1：每个域名每个区域的数据分别返回
            'Regions' => 'CN', //查询区域
            'DataType' => 'origin', //数据类型,边缘或者回源 edge:边缘数据; origin:回源数据
            'ProtocolType' => 'http',
        ],
    ];
    $response = Cdn::getInstance()->request('GetBandwidthData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}


function testGetFlowData()
{
    global $ak;
    global $sk;
    //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
            'StartTime' => '2016-11-19T08:00+0800', //查询开始时间
            'EndTime' => '2016-11-20T08:00+0800', //查询结束时间
            'Granularity' => '240', //统计粒度，取值为 5（默认）：5分钟粒度
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0', //带宽数据返回类型  0：多域名多区域数据做合并；1：每个域名每个区域的数据分别返回
            'Regions' => 'CN', //查询区域
            'DataType' => 'edge', //数据类型,边缘或者回源 edge:边缘数据; origin:回源数据
            'ProtocolType' => 'http',
        ],
    ];
    $response = Cdn::getInstance()->request('GetFlowData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetPvData()
{
    global $ak;
    global $sk;
    //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'Granularity' => '240', //统计粒度，取值为 5（默认）：5分钟粒度
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'ResultType' => '0',
            'Regions' => 'CN',
            'DataType' => 'edge',
            'Granularity' => '5', //统计粒度 取值为 5（默认）：5分钟粒度；10：10分钟粒度；20：20分钟粒度；60：1小时粒度；
            //240：4小时粒度；480：8小时粒度；1440：1天粒度；以上粒度均取该粒度时间段的请求数总和
            'ProtocolType' => 'http',
        ],
    ];
    $response = Cdn::getInstance()->request('GetPvData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetHitRateDetailedData()
{
    global $ak;
    global $sk;
    //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'Granularity' => '240', //统计粒度，取值为 5（默认）：5分钟粒度
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'ResultType' => '0',
            'HitType' => 'flowhitrate', //数据类型,按流量或者请求数统计 flowhitrate:流量命中率;reqhitrate:请求数命中率;
        ],
    ];
    $response = Cdn::getInstance()->request('GetHitRateDetailedData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetHitRateData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            //'DomainIds'=>'2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
        ],
    ];
    $response = Cdn::getInstance()->request('GetHitRateData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetProvinceAndIspFlowData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
            //'Provinces'=>'', //省份区域名称 多个省份区域用逗号（半角）分隔，缺省为全部省份区域
            //'Isps'=>'', //运营商名称 多个运营商用逗号（半角）分隔，缺省为全部运营商
            'StartTime' => '2016-11-19T00:00+0800',
            'EndTime' => '2016-11-19T23:00+0800',
            'Granularity' => '240', //统计粒度，取值为 5（默认）：5分钟粒度
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'ResultType' => '0',
        ],
    ];
    $response = Cdn::getInstance()->request('GetProvinceAndIspFlowData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetProvinceAndIspBandwidthData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
            //'Provinces'=>'', //省份区域名称 多个省份区域用逗号（半角）分隔，缺省为全部省份区域
            //'Isps'=>'', //运营商名称 多个运营商用逗号（半角）分隔，缺省为全部运营商
            'StartTime' => '2016-11-19T00:00+0800',
            'EndTime' => '2016-11-19T23:00+0800',
            'Granularity' => '480',
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'ResultType' => '1',

        ],
    ];
    $response = Cdn::getInstance()->request('GetProvinceAndIspBandwidthData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetHttpCodeData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
            'StartTime' => '2016-11-19T00:00+0800',
            'EndTime' => '2016-11-19T23:00+0800',
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
        ],
    ];
    $response = Cdn::getInstance()->request('GetHttpCodeData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetHttpCodeDetailedData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
            'StartTime' => '2016-11-19T00:00+0800',
            'EndTime' => '2016-11-19T23:00+0800',
            'Granularity' => '240', //统计粒度，取值为 5（默认）：5分钟粒度
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'ResultType' => '0', //返回类型为合并返回
        ],
    ];
    $response = Cdn::getInstance()->request('GetHttpCodeDetailedData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetTopUrlData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
            'StartTime' => '2016-11-19T00:00+0800',
            'EndTime' => '2016-11-19T23:00+0800',
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
            'LimitN' => '5',  //热门Url条数
        ],
    ];
    $response = Cdn::getInstance()->request('GetTopUrlData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetAreaData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
            'StartTime' => '2016-11-19T00:00+0800',
            'EndTime' => '2016-11-19T23:00+0800',
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载
        ],
    ];
    $response = Cdn::getInstance()->request('GetAreaData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetIspData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NS4', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名
            'StartTime' => '2016-11-19T00:00+0800',
            'EndTime' => '2016-11-19T23:00+0800',
            'CdnType' => 'video', //产品类型 video:音视频点播 file:大文件下载
        ],
    ];
    $response = Cdn::getInstance()->request('GetIspData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetUvData()
{
    //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainIds' => '2D09NK5', //域名ID，支持批量域名查询，多个域名ID用逗号（半角）分隔; 缺省为当前产品类型下的全部域名，
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'Granularity' => '5', //统计粒度，取值为 5（默认）：5分钟粒度
            'CdnType' => 'video', //产品类型 video:视频下载 file:大文件下载 live:直播加速 只允许输入一种
            'ResultType' => '0', //0:多域名多计费区域数据做合并 1：每个域名每个计费区域的数据分别返回
        ],
    ];
    $response = Cdn::getInstance()->request('GetUvData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetTopReferData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种 video:视频下载 file:大文件下载 live:直播加速
            'LimitN' => '5',
        ],
    ];
    $response = Cdn::getInstance()->request('GetTopReferData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetTopIpData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种,video:视频下载 file:大文件下载 live:直播加速
            'LimitN' => '5',
        ],
    ];
    $response = Cdn::getInstance()->request('GetTopIpData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetSrcHttpCodeData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种,video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0',
        ],
    ];
    $response = Cdn::getInstance()->request('GetSrcHttpCodeData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetSrcHttpCodeDetailedData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种,video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0',
        ],
    ];
    $response = Cdn::getInstance()->request('GetSrcHttpCodeDetailedData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetProvinceAndIspHitRateDetailedData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种,video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0',
        ],
    ];
    $response = Cdn::getInstance()->request('GetProvinceAndIspHitRateDetailedData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetProvinceAndIspHttpCodeData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种,video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0',
        ],
    ];
    $response = Cdn::getInstance()->request('GetProvinceAndIspHttpCodeData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetProvinceAndIspHttpCodeDetailedData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种,video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0',
        ],
    ];
    $response = Cdn::getInstance()->request('GetProvinceAndIspHttpCodeDetailedData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetProvinceAndIspPvData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2016-11-19T08:00+0800',
            'EndTime' => '2016-11-20T08:00+0800',
            'CdnType' => 'video', //产品类型只允许输入一种,video:视频下载 file:大文件下载 live:直播加速
            'ResultType' => '0',
        ],
    ];
    $response = Cdn::getInstance()->request('GetProvinceAndIspPvData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetBillingMode()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'CdnType' => 'live',
        ],
    ];
    $response = Cdn::getInstance()->request('GetBillingMode', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetBillingData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2017-02-01T00:00+0800',
            'EndTime' => '2017-02-28T23:56+0800',
            'CdnType' => 'video',//产品类型只允许输入一种 video:视频下载 file:大文件下载 live:直播加速
            'Regions' => 'CN,AS,NA,AU',
            'BillingMode' => 'monthflow',
        ],
    ];
    $response = Cdn::getInstance()->request('GetBillingData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetPeakBandwidthData()
{
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'StartTime' => '2017-02-01T00:00+0800',
            'EndTime' => '2017-02-28T23:56+0800',
            'CdnType' => 'video',//产品类型只允许输入一种 video:视频下载 file:大文件下载 live:直播加速
            'Regions' => 'CN,AS,NA,AU',
            'ProtocolType' =>'http',
        ],
    ];
    $response = Cdn::getInstance()->request('GetPeakBandwidthData', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testSetOriginAdvancedConfig(){
    global $ak;
    global $sk;
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query' => [
            'DomainId' => '2D093GC',//带设置域名id
            'Enable' => 'on',//设置高级回源配置的开启或关闭 取值: on、off。注意：开启后会关闭掉基础配置中的的回源配置。默认为off。开启时，下述必须项为必填项；关闭时，只更改此标识，忽略后面的项目。
            'OriginType' => 'ipaddr',//主源站类型，取值：ipaddr、 domain，分别表示：IP源站、域名源站。 主源站的信息也是在创建加速域名时所设置的源站信息。关闭高级回源配置后，则沿用创建加速域名时的回源配置
            "Origin" => '1.1.1.1',//主源站回源地址，可以是IP或域名；IP支持最多20个，以逗号区分，域名只能输入一个。IP与域名不能同时输入。
            "OriginPolicy" => 'quality',//回源规则，取值rr、quality。其中，rr: 轮询； quality: 按质量最优的topN来轮询回源。适用于主源站、热备源站
            "OriginPolivyBestCount" => '1',//取值1-10的整数。适用于主源站、热备源站，当OriginPolicy是quality时，该项必填。
            "BackupOriginType" => "domain",//热备源站类型，取值：ipaddr、 domain，分别表示：IP源站、域名源站。
            "BackupOrigin" => "ks.dd.com"//热备源站回源地址，可以是IP或域名；IP支持最多20个，以逗号区分，域名只能输入一个。IP与域名不能同时输入。
        ],
    ];
    $response = Cdn::getInstance()->request('SetOriginAdvancedConfig', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testGetDomainConfigs()
{
    global $ak;
    global $sk;
    //设置查询条件,可以多个条件组合查询,也可无查询条件查所有
    $params = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query'=>[
            'DomainId' => '2D093GC',
        ]
    ];
    $response = Cdn::getInstance()->request('GetDomainConfigs', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}


function testSetRequestAuthConfig()
{
	global $ak;
	global $sk;
	$params = [
		'v4_credentials' =>[
			'ak' => $ak,
			'sk' => $sk
        ],
    
        'query' => [
            'DomainId'=>'2D09555', //域名ID
            'Enable' => 'on', //配置是否开启或关闭取值：on、off，默认值为off关闭。开启时，下述必须项为必填项；关闭时，只更改此标识，忽略后面的项目
            'AuthType' => 'TypeA',//防盗链类型，取值：TypeA 、TypeB；默认为TypeA，开启后必填
            'Key1' => '1aaa',//主享密钥，必须由大小写字母（a-Z）或者数字（0-9）组成，长度在6-32个字符之间。密钥两边需加英文字符双引号””
            'Key2' => '1222',//备享密钥，必须由大小写字母（a-Z）或者数字（0-9）组成，长度在6-32个字符之间。密钥两边需加英文字符双引号””
			'ExpirationTime'=>10,//过期时间，单位为“秒”，输入大于等于0的正整数，最大不要超过31536000
        ]
    ];
    $response = Cdn::getInstance()->request('SetRequestAuthConfig', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testSetForceRedirectConfig()
{
	global $ak;
	global $sk;
	$params = [
		'v4_credentials' =>[
			'ak' => $ak,
			'sk' => $sk
        ],
        'query' => [
             'DomainId'=>'2D09555', //域名ID
             'RedirectType' => 'off', //配置强制跳转类型, 取值: off、 https，默认为off 。其中https表示http → https，当选择https时需保证域名已配置证书
         ],
    ];
    $response = Cdn::getInstance()->request('SetForceRedirectConfig', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

    /**
     * 设置HTTP 2.0
     */
function testSetHttp2OptionConfig()
{
	global $ak;
	global $sk;
	$params = [
		'v4_credentials' =>[
			'ak' => $ak,
			'sk' => $sk
        ],
        'query' => [
            'DomainId'=>'2D09555', //域名ID
            'Enable' => 'off', //配置HTTP 2.0功能的开启或关闭 取值：on、off ，默认为off ；开启需保证域名已配置证书
        ],
    ];
    $response = Cdn::getInstance()->request('SetHttp2OptionConfig', $params);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

 /**
     * 设置智能压缩
     */
function testSetPageCompressConfig()
{
	global $ak;
	global $sk;
	$params = [
		'v4_credentials' =>[
			'ak' => $ak,
			'sk' => $sk
        ],
        'query' => [
            'DomainId'=>'2D09555', //域名ID
            'Enable' => 'off', //配置智能压缩的开启或关闭 取值：on、off ，默认为off 。
        ],
    ];
    $response = Cdn::getInstance()->request('SetPageCompressConfig', $params);
    echo (String)$response->getBody();
	echo (String)$response->getStatusCode();
}
    /**
     * 自定义错误页面
     */
function testSetErrorPageConfig()
{
		/*参数说明
		DomainId域名ID
		ErrorPages由ErrorPage组成的数组，表示自定义错误页面列表。注意：该数组是有序的，如果一个相同状态码在数组里有配置子集，则以最后面的子集为准
		ErrorPage:
				ErrorHttpCode错误的状态码
				CustomPageUrl自定义发生错误后跳转的页面URL
		*/
	global $ak;
	global $sk;
	$data="{\"DomainId\":\"2D09555\",\"ErrorPages\":[{\"ErrorHttpCode\":\"404\",\"CustomPageUrl\":\"https://www.test.com/error404.html\"},{\"ErrorHttpCode\":\"403\",\"CustomPageUrl\":\"https://www.test.com/error403.html\"}]}";
	$params=[
		'v4_credentials' =>[
			'ak' => $ak,
			'sk' => $sk
		],
		'body'=>$data,
	];
	$response=Cdn::getInstance()->request('SetErrorPageConfig',$params);
	echo (String)$response->getBody();
	echo (String)$response->getStatusCode();
}


//testGetCdnDomains();
//testAddCdnDomain();
//testGetBandwidthData();
//testGetFlowData();
//testGetPvData();
//testGetHitRateDetailedData();
//testGetHitRateData();
//testGetProvinceAndIspFlowData();
//testGetProvinceAndIspBandwidthData();
//testGetHttpCodeData();
//testGetHttpCodeDetailedData();
//testGetTopUrlData();
//testGetAreaData();
//testGetIspData();
//testGetUvData();
//testGetTopReferData();
//testGetTopIpData();
//testGetSrcHttpCodeData();
//testGetSrcHttpCodeDetailedData();
//testGetProvinceAndIspHitRateDetailedData();
//testGetProvinceAndIspHttpCodeData();
//testGetProvinceAndIspHttpCodeDetailedData();
//testGetProvinceAndIspPvData();
//testGetBillingMode();
//testGetBillingData();
//testGetPeakBandwidthData();
//testSetRequestAuthConfig();
//testSetOriginAdvancedConfig();
//testGetDomainConfigs();
//testSetRequestAuthConfig();
//testSetForceRedirectConfig();
//testSetHttp2OptionConfig();
//testSetPageCompressConfig();
testSetErrorPageConfig();
