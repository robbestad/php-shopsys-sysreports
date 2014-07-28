<?php

namespace SysReports;

require_once __DIR__ . '/../../../../svenanders/sarmysql/src/SarMysql/SarMysql.php';

class SysReports
{

    protected $report;

    public function __construct()
    {

    }

    public function getNumberOfLastOrders()
    {
        $db = new \SarMysql\SarMysql();
        $lastInvoiced = $db->select("reskontro", array("Invoice"), "WHERE ID > ? ORDER BY ID DESC LIMIT 1", array("0"), 2);
        $val = $db->select("invoice ", array("ID"), "WHERE ID >= ?", array($lastInvoiced["Invoice"]));
        return count($val);
    }

    public function getNumberOfNewUsers()
    {
        $db = new \SarMysql\SarMysql();
        $val = $db->select("user ", array("ID"), "WHERE Time >= ?", array(date("Y-m-d H:i:s", strtotime("-1 week"))));
        return count($val);
    }

    public function getListOfWeeklySales()
    {
        $db = new \SarMysql\SarMysql();
        $val = $db->select("reskontro r ", array(
                array("r.Date", "Date"),
                array("CONCAT(YEAR(r.Date), '-', LPAD(WEEK(r.Date), 2, '0'))", "weekyear"),
                array("SUM( r.Amount )", "Sum")
            ),
            "WHERE r.Invoice > ? GROUP BY weekyear ORDER BY weekyear DESC LIMIT 10",
            array(0)
        );
        return $val;
    }


    public function getOrderJournal($dateRange = '')
    {
        if (empty($dateRange)) {
            $dateRange = array(
                date("Y-m-d 00:00:00", strtotime("-6 weeks")),
                date("Y-m-d 23:59:59", strtotime("now"))
            );
        }

        $db = new \SarMysql\SarMysql();
        $val = $db->select("invoice i, billing b ",
            array(
                "i.ID",
                "i.Created", "b.Method"
            ),
            "WHERE i.Active = 'Y'
            AND i.billing = b.ID
            AND i.Created >= ?
            AND i.Created <= ?", array($dateRange[0], $dateRange[1]));
        return $val;

    }
}
