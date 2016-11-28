<?php
namespace Ksyun\Tests;
use Ksyun\Service\Cdn;

class CdnTest extends \PHPUnit_Framework_TestCase
{
	public function testGetCdnDomains()
	{
		$params = {
			'query'=>[
				
			],
		};
		$response = Cdn::getInstance()->request('GetCdnDomains', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
	}
}