# SDK
>此SDK不作为官方SDK，仅作为技术交流使用。相关同学感兴趣可以随时联系QQ:360275482。美女优先添加。

##使用方式
####composer引用
```
composer require maigoxin/ksyun_sdk
```
####ak|sk配置
>获取到用户的aksk后配置在文件
```
~\.ksyun\config
```
####config文件结构
```
{
    "ak":"AKLTPeYwGi78S5-6y9RrHello",
    "sk":"OOiXFoKYYQSJ4YNtvlN8hsnLbJ6/kARKU+sHxgfUUy0/JqpzKgPyx=="
}
```

##功能列表
- [IAM](http://www.ksyun.com/doc/art/id/1663)
- [KEC](http://www.ksyun.com/doc/art/id/1660)
- [EIP](http://www.ksyun.com/doc/art/id/1659)
- [VPC](http://www.ksyun.com/doc/art/id/1661)
- [SLB](http://www.ksyun.com/doc/art/id/1662)

>敬请期待

##推荐demo
```
<?php
require('./vendor/autoload.php');
use Ksyun\Service\Iam;
$response = Iam::getInstance()->request('ListUsers');
echo (string)$response->getBody();
```

```
<?php
require('./vendor/autoload.php');
use Ksyun\Service\Kec;
$response = Kec::getInstance()->request('DescribeInstances', [], 'cn-beijing-6');
echo (string)$response->getBody();
```

```
<?php
require('./vendor/autoload.php');
use Ksyun\Service\Eip;
$response = Eip::getInstance()->request('DescribeAddresses', ['query' => ['MaxResults' => 10]], 'cn-beijing-6');
echo (string)$response->getBody();
```

```
<?php
require('./vendor/autoload.php');
use Ksyun\Service\Iam;
$ak = 'this is ak';
$sk = 'this is sk';
$response = Iam::getInstance()->request('ListUsers', ['v4_credentials' => ['ak' => $ak, 'sk' => $sk]]);
echo (string)$response->getBody();
```
##联合开发方案
>欢迎大家加入联合开发，开发原则是添加Service对应class并且补充齐全对应的tests相关代码。
>原则提交merge request后我会尽快处理，并且回复大家问题
