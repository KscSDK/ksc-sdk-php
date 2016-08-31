<?php
require('./vendor/autoload.php');
use Ksyun\Service\Vpc;
use Ksyun\Service\Kec;
use Ksyun\Service\Eip;

function getResponse($response)
{
    return json_decode((string)$response->getBody(), true);
}

//----------------------------------
//查询vpc
$response = Vpc::getInstance()->request('DescribeVpcs');
$vpcInfo = getResponse($response);
$vpcId = $vpcInfo['VpcSet'][0]['VpcId'];
var_dump("vpcId is " . $vpcId);

//查询subnet
$param = array(
    'Filter.1.Name'    => 'vpc-id',
    'Filter.1.Value.1' => $vpcId,
    'Filter.2.Name'    => 'subnet-type',
    'Filter.2.Value.1' => 'Normal',
);
$response = Vpc::getInstance()->request('DescribeSubnets', array('query'=>$param));
$subnetInfo = getResponse($response);
$subnetId = $subnetInfo['SubnetSet'][0]['SubnetId'];
var_dump("subnetId is " . $subnetId);

//查询安全组
$param = array(
    'Filter.1.Name'    => 'vpc-id',
    'Filter.1.Value.1' => $vpcId,
);
$response = Vpc::getInstance()->request('DescribeSecurityGroups', array('query'=>$param));
$securityInfo = getResponse($response);
$securityGroupId = $securityInfo['SecurityGroupSet'][0]['SecurityGroupId'];
var_dump("securityGroupId is " . $securityGroupId);

//查询镜像
$response = Kec::getInstance()->request('DescribeImages');
$imageInfo = getResponse($response);
$imageId = $imageInfo['ImagesSet'][0]['ImageId'];
var_dump("imageId is " . $imageId);

//创建kec
$param = array(
    'ImageId'  => $imageId,
    'MaxCount' => 1,
    'MinCount' => 1,
    'SubnetId' => $subnetId,
    'InstancePassword' => 'zhangli@King9',
    'ChargeType'   => 'Daily',
    'PurchaseTime' => 0,
    'SecurityGroupId' => $securityGroupId,
);
$response = Kec::getInstance()->request('RunInstances', array('query'=>$param));
$kecInfo = getResponse($response);
$kecInstanceId = $kecInfo['InstancesSet'][0]['InstanceId'];
var_dump("kecInstanceId is " . $kecInstanceId);

//查询kec实例信息
$param = array(
    'Filter.1.Name'    => 'instance-id',
    'Filter.1.Value.1' => $kecInstanceId,
);
while (true) {
    $response = Kec::getInstance()->request('DescribeInstances', array('query'=>$param));
    $kecInstanceInfo = getResponse($response);
    $networkInterfaceId = $kecInstanceInfo['InstancesSet'][0]['NetworkInterfaceSet'][0]['NetworkInterfaceId'];
    if (is_null($networkInterfaceId)) {
        echo "sleeping...\n";
        sleep(5);
        continue;
    } else {
        var_dump("networkInterfaceId is " . $networkInterfaceId);
        break;
    }
}

//获取用户可选链路信息
$response = Eip::getInstance()->request('GetLines');
$lineInfo = getResponse($response);
$lineId = $lineInfo['LineSet'][0]['LineId'];
var_dump("lineId is " . $lineId);

//创建eip
$param = array(
    'LineId' => $lineId,
    'BandWidth' => 1,
    'ChargeType' => 'Daily',
);
$response = Eip::getInstance()->request('AllocateAddress', array('query'=>$param));
$eipInfo = getResponse($response);
$allocationId = $eipInfo['AllocationId'];
var_dump("allocationId is " . $allocationId);

//绑定eip
$param = array(
    'AllocationId' => $allocationId,
    'InstanceType' => 'Ipfwd',
    'InstanceId'   => $kecInstanceId,
    'NetworkInterfaceId' => $networkInterfaceId,
);
$response = Eip::getInstance()->request('AssociateAddress', array('query'=>$param));
$associateInfo = getResponse($response);
var_dump($associateInfo);
