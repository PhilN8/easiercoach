<?php

namespace Classes;

use Classes\Model;
use Classes\Route;
use Classes\Ticket;

class Purchase extends Model
{

    public int $purchase_id;
    public string $departure_date;
    public array $seats = [];

    public const TABLE = 'tbl_purchases';

    public function __construct($purchase_info = null)
    {
        parent::__construct(self::TABLE);

        if (!is_null($purchase_info)) {
            $this->purchase_id = $purchase_info[0];
            $this->departure_date = $purchase_info[1];
        }
    }

    /**
     * Returns the total earnings from all purchases
     * 
     * @return int
     */
    public function getTotalEarnings()
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

    public function newPurchase($purchase_info)
    {
        $purchase_info = array_filter($purchase_info, function ($info) {
            return $this->clean($info);
        }, ARRAY_FILTER_USE_KEY);


        $purchase_sql = "INSERT INTO {$this->table}(`first_name`, `last_name`, `id_number`, `tel_no`, `departure_date`, `route_id`, `number_of_seats`, `total_cost`, `role`)
                    VALUES(:fname, :lname, :id, :tel, :dep, :route_id, :seats, :total, :role)";

        $this->purchase_id = $this->db
            ->upsert($purchase_sql, [
                ":fname" => $purchase_info['fname'],
                ":lname" => $purchase_info['lname'],
                ":id" => $purchase_info['id-no'],
                ":tel" => $purchase_info['tel-no'],
                ":dep" => $purchase_info['dep-date'],
                ":route_id" => $purchase_info['route'],
                ":seats" => count($purchase_info['seats']),
                ":total" => $purchase_info['total_cost'],
                ":role" => 3,
            ], true);

        $this->departure_date = $purchase_info['dep-date'];
        $this->seats = $purchase_info['seats'];

        return $this;
    }
}
