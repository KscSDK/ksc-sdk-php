##使用方式
####composer引用
```
composer require kscsdk/ksyun_sdk
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
- [CDN](https://docs.ksyun.com/read/latest/107/_book/index.html)
- [TAG](https://docs.ksyun.com/read/latest/90/_book/index.html)

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

```
<?php
require('./vendor/autoload.php');
use Ksyun\Service\Cdn;   //详细CDN api调用示例 位于./tests/CdnTest.php
$response = Iam::getInstance()->request('GetCdnDomains', ['query'=>['DomainStatus' => 'online', 'CdnType' => 'download']);
echo (string)$response->getBody();
```

