<?php
namespace Ksyun\Tests;
use Ksyun\Service\Kec;

class KecTest extends \PHPUnit_Framework_TestCase
{
    public function testDescribeInstances()
    {
        $response = Kec::getInstance()->request('DescribeInstances', [], 'cn-beijing-6');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
