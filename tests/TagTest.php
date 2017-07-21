<?php
namespace Ksyun\Tests;
use Ksyun\Service\Tag;

class EipTest extends \PHPUnit_Framework_TestCase
{
    public function testDescribeTags()
    {
        $response = Tag::getInstance()->request('DescribeTags', ['query' => ['MaxResults' => 10]], 'cn-beijing-6');
        echo (string)$response->getBody();
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
