<?php
require('../vendor/autoload.php');
use Ksyun\Service\BillUnion;

$ak = "your ak";
$sk = "your sk";

 function testDescribeBillSummaryByPayMode()
{
    global $ak;
    global $sk;
    $config = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query'=>[
            'BillBeginMonth' => '2020-09',
            'BillEndMonth' => '2020-09', 
        ]
    ];
    var_dump($config);
    $response = BillUnion::getInstance()->request('DescribeBillSummaryByPayMode',$config);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

function testIQiyi()
{
    global $ak;
    global $sk;
    $config = [
        'v4_credentials' =>[
            'ak' => $ak,
            'sk' => $sk
        ],
        'query'=>[
            'instanceId' => 'your instance id',
            'date' => '2020-09-01', 
        ]
    ];
    var_dump($config);
    $response = BillUnion::getInstance()->request('GetIQIYIInstanceBill',$config);
    echo (String)$response->getBody();
    echo (String)$response->getStatusCode();
}

testDescribeBillSummaryByPayMode();
