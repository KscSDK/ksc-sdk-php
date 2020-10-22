<?php
namespace Ksyun\Tests;
use Ksyun\Service\BillUnion;

class BillUnionTest extends \PHPUnit_Framework_TestCase
{
    public function tesxtDescribeBillSummaryByPayMode()
    {
      
        $config['query'] = ['BillBeginMonth' => '2020-09','BillEndMonth' => '2020-09'];

        $response = BillUnion::getInstance()->request('DescribeBillSummaryByPayMode',$config);
        echo (string)$response->getBody();
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
