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
- [CDN]()

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
use Ksyun\Service\Cdn;
  // CDN API调用详细示例 位于 ./tests/CdnTest.php
$params = [
    'query'=>[
        'PageSize' => '20',  //分页大小
        'PageNumber' => '1', //取第几页
        'DomainName' => '',  //按域名过滤  默认为空，代表当前用户下所有域名
        'DomainStatus' => 'online', //按域名状态过滤
        'CdnType' => 'download', //产品类型
        'FuzzyMatch' => '', //域名过滤是否使用模糊匹配
    ],
];
$response = Cdn::getInstance()->request('GetCdnDomains', $params);
echo (string)$response->getBody();
```
