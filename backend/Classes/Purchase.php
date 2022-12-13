<?php

namespace Classes;

use Classes\Model;
use Classes\Route;
use Classes\Ticket;

class Purchase extends Model
{
    public const TABLE = 'tbl_purchases';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function getSumOfPurchases()
    {
        $sql = "SELECT SUM(`total_cost`) as `total` FROM {$this->table}";

        return $this->db
            ->query($sql, [])
            ->find()['total'] ?? 0;
    }

    public function getPurchases()
    {
        $sql = "SELECT `a`.`purchase_id`, `a`.`first_name`, `a`.`last_name`, 
        `a`.`departure_date`, `a`.`total_cost`, `b`.`departure`, `b`.`destination`, 
        COUNT(`c`.`seat_number`) AS `seats` FROM (({$this->table} AS a INNER JOIN 
        " . Ticket::TABLE . "  AS c ON `a`.`purchase_id` = `c`.`purchase_id`) INNER JOIN 
        " . Route::TABLE . " AS `b` ON `b`.`route_id` = `a`.`route_id`) GROUP BY `purchase_id`";

        return $this->db
            ->query($sql)
            ->all();
    }

    public function getPurchaseInfo($purchase_id)
    {
        $sql = "SELECT `a`.`first_name`, `a`.`last_name`, `a`.`departure_date`, `a`.`tel_no`,
        `a`.`id_number`, `a`.`total_cost`, `b`.`departure`, `b`.`destination` FROM {$this->table} AS a 
        INNER JOIN " . Route::TABLE . " AS `b` ON `b`.`route_id` = (SELECT `route_id` FROM 
        {$this->table} WHERE `purchase_id` = ?) AND `a`.`purchase_id` = ?";

        return $this->db
            ->query($sql, [$purchase_id, $purchase_id])
            ->find();
    }
}
