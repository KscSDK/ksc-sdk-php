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
                    'region' => 'cn-shanghai-1',
                    'service' => 'cdn',
                ],
            ],
        ];
    }
    
    protected $apiList =[
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
        // 内容管理接口
        // 日志下载 downloadLogsetting
        'GetDomainLogs' => [
            'url' => '/2016-05-20/log/{domain}/logs',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-05-20',
                    'X-Action' => 'GetLog',
                ],
            ],
        ], 
        //刷新文件或目录   post
        'RefreshCaches' => [
            'url' => '/2016-07-11/distribution/invalidation',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2016-07-11',
                    'X-Action' => 'CreateInvalidation',
                    'content-type' => 'application/json',
                ],
            ],
        ], 
        
        //preloadFiles   post xml
        'PreloadCache' => [
            'url' => '/2015-09-17/distribution/{domain}/preload',
            'method' => 'post',
            'config' => [
                'headers' => [
                    'X-Version' => '2015-09-17',
                    'X-Action' => 'CreatePreload',
                    'content-type' => 'text/xml',
                ],
            ],
        ],
        
        //查询当前配额 
        'GetQuotaConfig' => [
            'url' => '/2015-09-17/quota/config',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2015-09-17',
                    'X-Action' => 'GetQuotaConfig',
                ],
            ],
        ], 
        //查询当前配额已使用量
        'GetQuotaUsageAmount' => [
            'url' => '/2015-09-17/quota/usage-amount',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2015-09-17',
                    'X-Action' => 'GetQuotaUsageAmount',
                ],
            ],
        ], 
        //查询刷新及预加载结果
        'ListInvalidationsByContentPath' => [
            'url' => '/2015-09-17/distribution/content-path',
            'method' => 'get',
            'config' => [
                'headers' => [
                    'X-Version' => '2015-09-17',
                    'X-Action' => 'ListInvalidationsByContentPath',
                ],
            ],
        ], 
        
    ];
    
    //特殊封装  request
    public function request($api, array $config = [])
    {
        if($api === 'GetDomainLogs'){
            $domain = $config['query']['domain'];
            $config['query'] = $this->array_remove($config['query'] , 'domain');               
            $config['replace']['domain'] = base64_encode($domain);
         
        }else if($api === 'PreloadCache'){
            $files = isset($config['files']) ? $config['files'] : false;
            if($files!==false){
                $config = $this->array_remove($config, 'files'); //清空参数
                $this->proloadpost($files, $api, $config);
            }else{
                echo "files is not set.";
            }
            return ;
        }
        
        return parent::request($api, $config);
    }
    
    // PreloadCache 封装xml 发送
    private function proloadpost($files, $api, $config){
        
        foreach($files as $url){
            $tempu=parse_url($url);  
            $strdomain = $tempu['host'];  
            $strPath = $tempu['path'];
            isset($domains[$strdomain]) ?  $domains[$strdomain][]=$strPath: $domains[$strdomain]=[$strPath,];
        } 
        $keys = array_keys($domains);

        foreach($keys as $key){
            $distributionId = base64_encode($key);
       
            $dom = new DOMDocument(); 
            $root = $dom->createElement("PreloadBatch"); 
            $dom->appendChild($root); 
            $paths = $dom->createElement("Paths"); 
            $root->appendChild($paths); 
            $items = $dom->createElement("Items");
            $paths->appendChild($items);
            foreach($domains[$key] as $path){
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
    private function array_remove($data, $key){  
        if(!array_key_exists($key, $data)){  
            return $data;  
        }  
        $keys = array_keys($data);  
        $index = array_search($key, $keys);  
        if($index !== FALSE){  
            array_splice($data, $index, 1);  
        }  
        return $data;  
    }
    private function create_guid() {
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);
        $uuid = ''.substr($charid, 0, 8).$hyphen
                    .substr($charid, 8, 4).$hyphen
                    .substr($charid,12, 4).$hyphen
                    .substr($charid,16, 4).$hyphen
                    .substr($charid,20,12);
        return $uuid;
    }
    
}


