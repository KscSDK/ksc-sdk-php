<?php
namespace Ksyun\Tests;
use Ksyun\Service\Monitor;

class MonitorTest extends \PHPUnit_Framework_TestCase
{
    public function testListMetric()
    {
        $params = [
            'query' => [
                'Namespace' => 'KEC',
                'InstanceID' => '7af8d721-fb03-4d5b-a4a7-0ff983a2c30b',
                'PageIndex' => 1,
                'PageSize' => 10,
                'MetricName' => 'cpu.utilizition.total',
            ]
        ];
        $response = Monitor::getInstance()->request('ListMetrics', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testGetMetricStatistics()
    {
        $params = [
            'query' => [
                'Namespace' => 'KEC',
                'InstanceID' => '7af8d721-fb03-4d5b-a4a7-0ff983a2c30b',
                'MetricName' => 'cpu.utilizition.total',
                'StartTime' => '2017-09-20T17:00:00Z',
                'EndTime' => '2017-09-21T17:00:00Z',
                'Period' => 60,
                'Aggregate' => 'Count',
            ]
        ];
        $response = Monitor::getInstance()->request('GetMetricStatistics', $params);
        return $this->assertEquals($response->getStatusCode(), 200);
    }
}
