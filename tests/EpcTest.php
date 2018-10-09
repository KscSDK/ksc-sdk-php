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

    public function testStartEpc()
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
        $response = Epc::getInstance()->request('StartEpc', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testModifyEpc()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId' => '95220112-ab41-4595-85df-e6d04cb21784', //物理机ID
                'HostName' => 'phptest', //物理机名称
            ],
        ];
        $response = Epc::getInstance()->request('ModifyEpc', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testRebootEpc()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId' => '95220112-ab41-4595-85df-e6d04cb21784', //物理机ID
            ],
        ];
        $response = Epc::getInstance()->request('RebootEpc', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testModifyNetworkInterfaceAttribute()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId' => '00ac6501-b56d-4787-a202-a11f86e5b0c4', //物理机ID
                'NetworkInterfaceId' => '00ac6501-b56d-4787-a202-a11f86e5b0c4', //网卡ID
                'SubnetId' => 'b8effbbe-4de4-4404-8ecc-cb83037be913', //子网ID
                'IpAddress' => '10.0.1.199', //物理机ID
                'SecurityGroupId.1' => 'a6bd5feb-a21e-43d0-bc2f-33f6fcbe6caf', //安全组ID
            ],
        ];
        $response = Epc::getInstance()->request('ModifyNetworkInterfaceAttribute', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreateEpc()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'AvailabilityZone' => 'cn-shanghai-3b',
                'ImageId' => 'f38624d3-0719-4e5d-970f-cad32095a7cf',
                'NetworkInterfaceMode' => 'bond4',
                'SubnetId' => 'b8effbbe-4de4-4404-8ecc-cb83037be913',
                'SecurityGroupId.1' => 'a6bd5feb-a21e-43d0-bc2f-33f6fcbe6caf',
                'KeyId' => '5fec33e5-72fa-4930-874e-5d74f4856cb6',
                'HostName' => 'ssd-tst',
                'ChargeType' => 'Daily',
                'Password' => 'Abc@1234',
                'SecurityAgent' => 'classic',
                'CloudMonitorAgent' => 'classic',
                'Raid' => 'Raid5',
                'HostType' => 'SSD',
            ],
        ];
        $response = Epc::getInstance()->request('CreateEpc', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testReinstallEpc()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId' => '00ac6501-b56d-4787-a202-a11f86e5b0c4', //物理机ID
                'ImageId' => 'f38624d3-0719-4e5d-970f-cad32095a7cf',
                'KeyId' => '5fec33e5-72fa-4930-874e-5d74f4856cb6',
                'Password' => 'Abc@1234',
                'NetworkInterfaceMode' => 'bond4',
                'Raid' => 'Raid5',
            ],
        ];
        $response = Epc::getInstance()->request('ReinstallEpc', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreateImage()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId' => '95220112-ab41-4595-85df-e6d04cb21784', //物理机ID
                'ImageName' => 'phptest',
            ],
        ];
        $response = Epc::getInstance()->request('CreateImage', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDescribeImages()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
        ];
        $response = Epc::getInstance()->request('DescribeImages', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteImage()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'ImageId' => 'bd0d7c44-5508-11e8-803a-e8611f1450d8', //镜像ID
            ],
        ];
        $response = Epc::getInstance()->request('DeleteImage', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDescribeKeys()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
        ];
        $response = Epc::getInstance()->request('DescribeKeys', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testModifyKey()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'KeyId' => 'daa2b3b5-6cf5-4f8b-b7fa-76560b0f8b1a', //KEY ID
                'KeyName' => 'weiweitest', //KEY NAME
            ],
        ];
        $response = Epc::getInstance()->request('ModifyKey', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteKey()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'KeyId' => 'daa2b3b5-6cf5-4f8b-b7fa-76560b0f8b1a', //KEY ID
            ],
        ];
        $response = Epc::getInstance()->request('DeleteKey', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreateKey()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
        ];
        $response = Epc::getInstance()->request('CreateKey', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDescribePhysicalMonitor()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'HostId' => '95220112-ab41-4595-85df-e6d04cb21784', //物理机ID
            ],
        ];
        $response = Epc::getInstance()->request('DescribePhysicalMonitor', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDescribeCabinets()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
        ];
        $response = Epc::getInstance()->request('DescribeCabinets', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDescribeRemoteManagements()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
        ];
        $response = Epc::getInstance()->request('DescribeRemoteManagements', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetDynamicCode()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'RemoteManagementId' => 'a96d5a74-005f-4212-88c7-b1ce6328fbfc', //RemoteManagementId
            ],
        ];
        $response = Epc::getInstance()->request('GetDynamicCode', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreateRemoteManagement()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'PhoneNumber' => '12345678901', //手机号码
                'Pin' => '123456', //Pin
                'Name' => 'test', //Name
            ],
        ];
        $response = Epc::getInstance()->request('CreateRemoteManagement', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testModifyRemoteManagement()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'RemoteManagementId' => '6e991efe-ff02-4a07-aaa2-51d488e95a5a', //RemoteManagementId
                'Name' => 'test1111', //Name
            ],
        ];
        $response = Epc::getInstance()->request('ModifyRemoteManagement', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteRemoteManagement()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'RemoteManagementId' => '6e991efe-ff02-4a07-aaa2-51d488e95a5a', //RemoteManagementId
            ],
        ];
        $response = Epc::getInstance()->request('DeleteRemoteManagement', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDescribeEpcManagements()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'RemoteManagementId' => 'a96d5a74-005f-4212-88c7-b1ce6328fbfc', //RemoteManagementId
                'DynamicCode' => '746301',
                'Pin' => '123456',
            ],
        ];
        $response = Epc::getInstance()->request('DescribeEpcManagements', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDescribeVpns()
    {
        $params = [
            'v4_credentials' =>[
                'ak' => 'your ak',
                'sk' => 'your sk',
            ],
            'query' => [
                'RemoteManagementId' => 'a96d5a74-005f-4212-88c7-b1ce6328fbfc', //RemoteManagementId
                'DynamicCode' => '321452',
                'Pin' => '123456',
            ],
        ];
        $response = Epc::getInstance()->request('DescribeVpns', $params, 'cn-shanghai-3');
        print_r(json_decode((string)$response->getBody(), true));
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
