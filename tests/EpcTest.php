<?php
namespace Ksyun\Tests;
use Ksyun\Service\Epc;

class EpcTest extends \PHPUnit_Framework_TestCase
{
    public function testListEpcs()
    {
        $response = Epc::getInstance()->request('ListEpcs', [], 'cn-beijing-6');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
