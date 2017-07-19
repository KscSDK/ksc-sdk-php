<?php
/**
 *  creator: dinglei
 */

namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
use \DOMDocument;

class Cdn extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'http://cdn.api.ksyun.com',
            'config' => [
                'timeout' => 60,  //设置timeout
                'v4_credentials' => [
                    'region' => 'cn-shanghai-2',
                    'service' => 'cdn',
                ],
            ],
        ];
    }

    protected $apiList = [
        //获取域名列表
        'GetCdnDomains' => [
            'url' => '/2016-09-01/domain/GetCdnDomains',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetCdnDomains',
                ],
            ],
        ],
        //新增域名
        'AddCdnDomain' => [
            'url' => '/2016-09-01/domain/AddCdnDomain',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'AddCdnDomain',
                ],
            ],
        ],
        //查询域名基础信息
        'GetCdnDomainBasic' => [
            'url' => '/2016-09-01/domain/GetCdnDomainBasicInfo',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetCdnDomainBasicInfo',
                ],
            ],
        ],
        //修改域名基本配置
        'ModifyCdnDomain' => [
            'url' => '/2016-09-01/domain/ModifyCdnDomainBasicInfo',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'ModifyCdnDomainBasicInfo',
                ],
            ],
        ],
        //启用、停用某个加速域名 StartStopCdnDomain
        'StartStopCdnDomain' => [
            'url' => '/2016-09-01/domain/StartStopCdnDomain',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'StartStopCdnDomain',
                ],
            ],
        ],
        //删除域名
        'DeleteCdnDomain' => [
            'url' => '/2016-09-01/domain/DeleteCdnDomain',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'DeleteCdnDomain',
                ],
            ],
        ],
        //查询域名详细配置信息
        'GetDomainConfigs' => [
            'url' => '/2016-09-01/domain/GetDomainConfigs',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetDomainConfigs',
                ],
            ],
        ],
        //设置过滤参数功能
        'SetIgnoreQueryStringConfig' => [
            'url' => '/2016-09-01/domain/SetIgnoreQueryStringConfig',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetIgnoreQueryStringConfig',
                ],
            ],
        ],
        //设置回源host功能
        'SetBackOriginHostConfig' => [
            'url' => '/2016-09-01/domain/SetBackOriginHostConfig',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetBackOriginHostConfig',
                ],
            ],
        ],
        //设置refer防盗链 
        'SetReferProtectionConfig' => [
            'url' => '/2016-09-01/domain/SetReferProtectionConfig',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetReferProtectionConfig',
                ],
            ],
        ],
        //设置Ip防盗链
        'SetIpProtectionConfig' => [
            'url' => '/2016-09-01/domain/SetIpProtectionConfig',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetIpProtectionConfig',
                ],
            ],
        ],
        //设置缓存策略 post
        'SetCacheRuleConfig' => [
            'url' => '/2016-09-01/domain/SetCacheRuleConfig',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetCacheRuleConfig',
                    'content-type' => 'application/json',
                ],
            ],
        ],
        //设置测试url
        'SetTestUrlConfig' => [
            'url' => '/2016-09-01/domain/SetTestUrlConfig',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetTestUrlConfig',
                ],
            ],
        ],
        //设置高级回源 post
        'SetOriginAdvancedConfig' => [
            'url' => '/2016-09-01/domain/SetOriginAdvancedConfig',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetOriginAdvancedConfig',
                    'content-type' => 'application/json',
                ],
            ],
        ],
        //设置备注信息
        'SetRemarkConfig' => [
            'url' => '/2016-09-01/domain/SetRemarkConfig',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetRemarkConfig',
                ],
            ],
        ],
        /**
         * 获取服务ip
         */
        'GetServiceIpData' => [
            'url' => '/2016-09-01/domain/GetServiceIpData',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetServiceIpData',
                ],
            ],
        ],
        //查询带宽 
        'GetBandwidthData' => [
            'url' => '/2016-09-01/statistics/GetBandwidthData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetBandwidthData',
                ],
            ],
        ],
        //查询流量
        'GetFlowData' => [
            'url' => '/2016-09-01/statistics/GetFlowData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetFlowData',
                ],
            ],
        ],
        //请求数查询
        'GetPvData' => [
            'url' => '/2016-09-01/statistics/GetPvData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetPvData',
                ],
            ],
        ],
        //命中率详情查询
        'GetHitRateDetailedData' => [
            'url' => '/2016-09-01/statistics/GetHitRateDetailedData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetHitRateDetailedData',
                ],
            ],
        ],
        // 命中率查询（饼图）
        'GetHitRateData' => [
            'url' => '/2016-09-01/statistics/GetHitRateData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetHitRateData',
                ],
            ],
        ],
        //省份+运营商流量查询
        'GetProvinceAndIspFlowData' => [
            'url' => '/2016-09-01/statistics/GetProvinceAndIspFlowData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetProvinceAndIspFlowData',
                ],
            ],
        ],
        //省份+运营商带宽查询
        'GetProvinceAndIspBandwidthData' => [
            'url' => '/2016-09-01/statistics/GetProvinceAndIspBandwidthData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetProvinceAndIspBandwidthData',
                ],
            ],
        ],
        //状态码统计
        'GetHttpCodeData' => [
            'url' => '/2016-09-01/statistics/GetHttpCodeData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetHttpCodeData',
                ],
            ],
        ],
        //状态码详情统计
        'GetHttpCodeDetailedData' => [
            'url' => '/2016-09-01/statistics/GetHttpCodeDetailedData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetHttpCodeDetailedData',
                ],
            ],
        ],
        //top url 查询
        'GetTopUrlData' => [
            'url' => '/2016-09-01/statistics/GetTopUrlData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetTopUrlData',
                ],
            ],
        ],
        //用户区域统计
        'GetAreaData' => [
            'url' => '/2016-09-01/statistics/GetAreaData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetAreaData',
                ],
            ],
        ],
        //运营商占比统计
        'GetIspData' => [
            'url' => '/2016-09-01/statistics/GetIspData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetIspData',
                ],
            ],
        ],
        //直播按流维度查询流量
        'GetLiveFlowDataByStream' => [
            'url' => '/2016-09-01/statistics/GetLiveFlowDataByStream',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetLiveFlowDataByStream',
                ],
            ],
        ],
        //直播按流维度查询带宽
        'GetLiveBandwidthDataByStream' => [
            'url' => '/2016-09-01/statistics/GetLiveBandwidthDataByStream',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetLiveBandwidthDataByStream',
                ],
            ],
        ],
        //直播按域名维度统计在线人数
        'GetLiveOnlineUserDataByDomain' => [
            'url' => '/2016-09-01/statistics/GetLiveOnlineUserDataByDomain',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetLiveOnlineUserDataByDomain',
                ],
            ],
        ],
        //直播按流维度统计在线人数
        'GetLiveOnlineUserDataByStream' => [
            'url' => '/2016-09-01/statistics/GetLiveOnlineUserDataByStream',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetLiveOnlineUserDataByStream',
                ],
            ],
        ],
        //直播TopN按流维度的在线人数排行
        'GetLiveTopOnlineUserData' => [
            'url' => '/2016-09-01/statistics/GetLiveTopOnlineUserData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetLiveTopOnlineUserData',
                ],
            ],
        ],
        //独立ip的请求个数
        'GetUvData' => [
            'url' => '/2016-09-01/statistics/GetUvData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetUvData',
                ],
            ],
        ],
        //top-rerfer查询
        'GetTopReferData' => [
            'url' => '/2016-09-01/statistics/GetTopReferData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetTopReferData',
                ],
            ],
        ],
        //省份运营商命中率查询
        'GetProvinceAndIspHitRateDetailedData' => [
            'url' => '/2016-09-01/statistics/GetProvinceAndIspHitRateDetailedData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetProvinceAndIspHitRateDetailedData',
                ],
            ],
        ],
        //省份运营商状态码查询
        'GetProvinceAndIspHttpCodeData' => [
            'url' => '/2016-09-01/statistics/GetProvinceAndIspHttpCodeData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetProvinceAndIspHttpCodeData',
                ],
            ],
        ],
        //省份运营商状态码详情查询
        'GetProvinceAndIspHttpCodeDetailedData' => [
            'url' => '/2016-09-01/statistics/GetProvinceAndIspHttpCodeDetailedData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetProvinceAndIspHttpCodeDetailedData',
                ],
            ],
        ],
        //省份运营商请求数查询
        'GetProvinceAndIspPvData' => [
            'url' => '/2016-09-01/statistics/GetProvinceAndIspPvData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetProvinceAndIspPvData',
                ],
            ],
        ],
        //回源状态码统计
        'GetSrcHttpCodeData' => [
            'url' => '/2016-09-01/statistics/GetSrcHttpCodeData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetSrcHttpCodeData',
                ],
            ],
        ],
        //回源状态码详情统计
        'GetSrcHttpCodeDetailedData' => [
            'url' => '/2016-09-01/statistics/GetSrcHttpCodeDetailedData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetSrcHttpCodeDetailedData',
                ],
            ],
        ],
        //top-ip统计
        'GetTopIpData' => [
            'url' => '/2016-09-01/statistics/GetTopIpData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetTopIpData',
                ],
            ],
        ],
        //查询目录带宽
        'GetBandwidthDataByDir' => [
            'url' => '/2016-09-01/statistics/GetBandwidthDataByDir',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetBandwidthDataByDir',
                ],
            ],
        ],
        //查询目录流量
        'GetFlowDataByDir' => [
            'url' => '/2016-09-01/statistics/GetFlowDataByDir',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetFlowDataByDir',
                ],
            ],
        ],
        //流名观看时长统计
        'GetPlayTimeDataByStream' => [
            'url' => '/2016-09-01/statistics/GetPlayTimeDataByStream',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetPlayTimeDataByStream',
                ],
            ],
        ],
        //客户域名id观看时长统计
        'GetPlayTimeDataByDomain' => [
            'url' => '/2016-09-01/statistics/GetPlayTimeDataByDomain',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetPlayTimeDataByDomain',
                ],
            ],
        ],

        //获取用户计费方式接口
        'GetBillingMode' => [
            'url' => '/2016-09-01/service/GetBillingMode',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetBillingMode',
                ],
            ],
        ],
        //获取计费数据接口
        'GetBillingData' => [
            'url' => '/2016-09-01/statistics/GetBillingData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetBillingData',
                ],
            ],
        ],
        //获取带宽峰值信息
        'GetPeakBandwidthData' => [
            'url' => '/2016-09-01/statistics/GetPeakBandwidthData',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetPeakBandwidthData',
                ],
            ],
        ],

        // 内容管理接口
        /**
         * 刷新接口
         */
        'RefreshCaches' => [
            'url' => '/2016-09-01/content/RefreshCaches',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'RefreshCaches',
                    'content-type' => 'application/json',
                ],
            ],
        ],
        /**
         * 预热接口
         */
        'PreloadCaches' => [
            'url' => '/2016-09-01/content/PreloadCaches',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'PreloadCaches',
                    'content-type' => 'application/json',
                ],
            ],
        ],
        /**
         * 刷新预热进度查询接口
         */
        'GetRefreshOrPreloadTask' => [
            'url' => '/2016-09-01/content/GetRefreshOrPreloadTask',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetRefreshOrPreloadTask',
                ],
            ],
        ],
        /**
         * 查询操作剩余量
         */
        'GetRefreshOrPreloadQuota' => [
            'url' => '/2016-09-01/content/GetRefreshOrPreloadQuota',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetRefreshOrPreloadQuota',
                ],
            ],
        ],
        // 日志管理接口
        /**
         * 日志下载接口
         */
        'GetDomainLogs' => [
            'url' => '/2016-09-01/log/GetDomainLogs',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetDomainLogs',
                ],
            ],
        ],
        /**
         * 启停日志服务接口
         */
        'SetDomainLogService' => [
            'url' => '/2016-09-01/log/SetDomainLogService',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetDomainLogService',
                ],
            ],
        ],
        /**
         * 查询日志服务状态
         */
        'GetDomainLogServiceStatus' => [
            'url' => '/2016-09-01/log/GetDomainLogServiceStatus',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetDomainLogServiceStatus',
                ],
            ],
        ],

        /**
         * 为单个或多个加速域名配置证书
         */
        'ConfigCertificate' => [
            'url' => '/2016-09-01/cert/ConfigCertificate',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'ConfigCertificate',
                ],
            ],
        ],

        /**
         * 屏蔽、解除屏蔽URL
         */
        'BlockDomainUrl' => [
            'url' => '/2016-09-01/content/BlockDomainUrl',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'BlockDomainUrl',
                ],
            ],
        ],

        /**
         * 获取屏蔽URL任务进度百分比及状态，查看任务是否在全网生效。
         */
        'GetBlockUrlTask' => [
            'url' => '/2016-09-01/content/GetBlockUrlTask',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetBlockUrlTask',
                ],
            ],
        ],

        /**
         * 获取屏蔽URL最大限制数量，及剩余的条数。
         */
        'GetBlockUrlQuota' => [
            'url' => '/2016-09-01/content/GetBlockUrlQuota',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetBlockUrlQuota',
                ],
            ],
        ],

        /**
         * 更新证书信息
         */
        'SetCertificate' => [
            'url' => '/2016-09-01/cert/SetCertificate',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'SetCertificate',
                ],
            ],
        ],

        /**
         * 根据证书id列表，英文半角逗号隔开，删除证书处于未启用状态才可以删除
         */
        'RemoveCertificates' => [
            'url' => '/2016-09-01/cert/RemoveCertificates',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'RemoveCertificates',
                ],
            ],
        ],

        /**
         * 分页获得用户下证书列表
         */
        'GetCertificates' => [
            'url' => '/2016-09-01/cert/GetCertificates',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-09-01',
                    'X-Action' => 'GetCertificates',
                ],
            ],
        ]
    ];

    //特殊封装  request
    public function request($api, array $config = [])
    {
        if ($api === 'GetDomainLogs') {
            $domain = $config['query']['domain'];
            $config['query'] = $this->array_remove($config['query'], 'domain');
            $config['replace']['domain'] = base64_encode($domain);

        } else if ($api === 'PreloadCache') {
            $files = isset($config['files']) ? $config['files'] : false;
            if ($files !== false) {
                $config = $this->array_remove($config, 'files'); //清空参数
                $this->proloadpost($files, $api, $config);
            } else {
                echo "files is not set.";
            }
            return;
        }

        return parent::request($api, $config);
    }

    // PreloadCache 封装xml 发送
    private function proloadpost($files, $api, $config)
    {

        foreach ($files as $url) {
            $tempu = parse_url($url);
            $strdomain = $tempu['host'];
            $strPath = $tempu['path'];
            isset($domains[$strdomain]) ? $domains[$strdomain][] = $strPath : $domains[$strdomain] = [$strPath,];
        }
        $keys = array_keys($domains);

        foreach ($keys as $key) {
            $distributionId = base64_encode($key);

            $dom = new DOMDocument();
            $root = $dom->createElement("PreloadBatch");
            $dom->appendChild($root);
            $paths = $dom->createElement("Paths");
            $root->appendChild($paths);
            $items = $dom->createElement("Items");
            $paths->appendChild($items);
            foreach ($domains[$key] as $path) {
                $item = $dom->createElement("Path");
                $items->appendChild($item);
                $text = $dom->createTextNode($path);
                $item->appendChild($text);
            }
            $quantity = $dom->createElement("Quantity");
            $paths->appendChild($quantity);
            $q = $dom->createTextNode(sizeof($domains[$key]));
            $quantity->appendChild($q);
            $Caller = $dom->createElement("CallerReference");
            $paths->appendChild($Caller);
            $uuid = $dom->createTextNode($this->create_guid());
            $Caller->appendChild($uuid);
            $config['body'] = $dom->saveXML();
            $config['replace']['domain'] = $distributionId;
            //var_dump($config);
            $response = parent::request($api, $config); // 发送
            //echo $response->getStatusCode();
            //echo "\n";
            //echo (string)$response->getBody();
        }
    }

    //删除指定key 数组元素
    private function array_remove($data, $key)
    {
        if (!array_key_exists($key, $data)) {
            return $data;
        }
        $keys = array_keys($data);
        $index = array_search($key, $keys);
        if ($index !== FALSE) {
            array_splice($data, $index, 1);
        }
        return $data;
    }

    private function create_guid()
    {
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);
        $uuid = '' . substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return $uuid;
    }

}


