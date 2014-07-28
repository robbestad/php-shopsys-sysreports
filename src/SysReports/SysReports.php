<?php

namespace SysReports;

require __DIR__.'/../../../../svenanders/sarmysql/src/SarMysql/SarMysql.php';

class SysReports
{

    protected $report;

    public function __construct()
    {

    }

    public function getLastOrders(){
        $db = new \SarMysql\SarMysql();
        $val=$db->select("invoice",array("ID"),"WHERE ID > ?",array("0"));
        return count($val);
    }


}
