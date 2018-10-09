<?php
require('../vendor/autoload.php');
use Ksyun\Service\Epc;

function getResponse($response)
{
    return json_decode((string)$response->getBody(), true);
}

//----------------------------------

//设置查询条件,可以多个条件组合查询,也可无查询条件查所有
$params = [
    'v4_credentials' =>[
        'ak' => 'your ak',
        'sk' => 'your sk',
    ],
    'query' => [
        'HostId.1' => 'c8f8c16d-ba15-49ab-a314-226e3060d8e6' //物理机ID
    ],
];
//查询EPC
$response = Epc::getInstance()->request('DescribeEpcs',$params,'cn-shanghai-3');
$epcInfo = getResponse($response);
print_r($epcInfo);