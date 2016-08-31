<?php
namespace Ksyun\Tests;
use Ksyun\Service\Iam;

class IamTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateUser()
    {
        $params = [
            'query' => [
                'UserName' => 'huangxin',
            ]
        ];
        $response = Iam::getInstance()->request('CreateUser', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteUser()
    {
        $params = [
            'query' => [
                'UserName' => 'huangxin',
            ]
        ];
        $response = Iam::getInstance()->request('DeleteUser', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetUser()
    {
        $params = [
            'query' => [
                'UserName' => 'huangxin',
            ]
        ];
        $response = Iam::getInstance()->request('ListUsers');
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdateUser()
    {
        $params = [
            'query' => [
                'UserName' => 'huangxin',
                'NewRealName' => '黄鑫',
            ]
        ];
        $response = Iam::getInstance()->request('UpdateUser', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testListIamUsers()
    {
        $response = Iam::getInstance()->request('ListUsers');
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
