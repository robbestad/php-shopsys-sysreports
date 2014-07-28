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

        $this->assertInternalType('integer', $SysReports->getLastOrders());
//        $this->assertNotEmpty($SysReports->getLastOrders());
    }

    public function testGetNewUsers()
    {
        $SysReports = new SysReports();

        $this->assertInternalType('integer', $SysReports->getNewUsers());
//        $this->assertNotEmpty($SysReports->getNewUsers());
    }


}
