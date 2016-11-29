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
				'PageSize'=>'20',
				'PageNumber'=>'1',
				'DomainName'=>'',
				'DomainStatus'=>'online',
				'CdnType'=>'download',
				'FuzzyMatch'=>'',
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
				'DomainName'=>'www.qunar.com',
				'CdnType'=>'download',
				//'CdnSubType'=>'',
				'CdnProtocol'=>'http',
				'Regions'=>'CN',
				'OriginType'=>'domain',
				'OriginProtocol'=>'http',
				'OriginPort'=>'80',
				'Origin'=>'www.ksyun.com',
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
				'DomainId'=>'2D09QXK',
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
				'DomainId'=>'2D09QXK',
				'Origin'=>'www.ks-cdn.com',
				'OriginType'=>'domain',
				'OriginPort'=>'80',
				//'Regions'=>'',
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
				'DomainId'=>'2D09QXK',
				'ActionType'=>'start',
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
				'DomainId'=>'2D09QXK',
				//'ConfigList'=>'cache_expired,cc,ignore_query_string',   //过滤规则
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
				'DomainId'=>'2D09QXK',
				'Enable'=>'on',   //  on  或者 off
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
				'DomainId'=>'2D09QXK',
				'BackOriginHost'=>'www.a.qunar.com',   //
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
				'DomainId'=>'2D09QXK',
				'Enable'=>'on',   //
				'ReferType'=>'block',
				'ReferList'=>'www.baidu.com,www.sina.com',
				//'AllowEmpty'=>'',  //默认 on
			],
		];
		$response = Cdn::getInstance()->request('SetReferProtectionConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//设置缓存策略  无
	
	//设置测试url
	public function testSetTestUrlConfig()
	{
		$params = [
			'query'=>[
				'DomainId'=>'2D09QXK',
				'TestUrl'=>'www.qunar.com/index.html',   
			],
		];
		$response = Cdn::getInstance()->request('SetTestUrlConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
	//设置高级回源  post 传json
	public function testSetOriginAdvancedConfig()
	{
		$origin_variable = array(
            'DomainId'=>'2D09RHK',
			'Enable'=>'on',
			'OriginPolicy'=>'quality',
			'OriginPolicyBestCount'=>1,
			'OriginType'=>'domain',
			'OriginAdvancedItems'=> array(
				array(
					'OriginLine'=>'default',
					'Origin'=>'www.b.qunar.com'
				),
				array(
					'OriginLine'=>'cm',
					'Origin'=>'www.c.qunar.com'
				),
			),
        );
		$data = json_encode($origin_variable);
		
		$params = [
			'body'=>$data,
		];
		$response = Cdn::getInstance()->request('SetOriginAdvancedConfig', $params);
		return $this->assertEquals($response->getStatusCode(), 200);
	}
	
	//设置备注信息
	public function testSetRemarkConfig()
	{
		$params = [
			'query'=>[
				'DomainId'=>'2D09QXK',
				'Remark'=>'设置备注信息',   
			],
		];
		$response = Cdn::getInstance()->request('SetRemarkConfig', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
    
    //
}





