<?php

namespace shopsys\tests;

use SysReports\SysReports;

require __DIR__ . '/../src/SysReports/SysReports.php';

class SysReportsTest extends \PHPUnit_Framework_TestCase
{


    public function __construct()
    {
    }

    public function testGetLastOrders()
    {
        $SysReports = new SysReports();

        $this->assertInternalType('integer', $SysReports->getNumberOfLastOrders());
//        $this->assertNotEmpty($SysReports->getLastOrders());
    }

    public function testGetNewUsers()
    {
        $SysReports = new SysReports();

        $this->assertInternalType('integer', $SysReports->getNumberOfNewUsers());
//        $this->assertNotEmpty($SysReports->getNewUsers());
    }

    public function testGetListOfWeeklySales()
    {
        $SysReports = new SysReports();
//        var_dump($SysReports->getListOfWeeklySales());
        $this->assertInternalType('array', $SysReports->getListOfWeeklySales());
//        $this->assertNotEmpty($SysReports->getNewUsers());
    }


}
