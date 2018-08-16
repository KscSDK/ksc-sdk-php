<?php
namespace Ksyun\Tests;
use Ksyun\Service\Epc;

class EpcTest extends \PHPUnit_Framework_TestCase
{
    public function testDescribeEpcs()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId.1' => '95220112-ab41-4595-85df-e6d04cb21784' //物理机ID
            ],
        ];
        $response = Epc::getInstance()->request('DescribeEpcs', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testStopEpc()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId' => '95220112-ab41-4595-85df-e6d04cb21784' //物理机ID
            ],
        ];
        $response = Epc::getInstance()->request('StopEpc', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
