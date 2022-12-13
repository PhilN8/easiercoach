<?php

namespace Classes;

use Classes\Model;

class Ticket extends Model
{
    private Route $route;
    private string $first_name;
    private string $last_name;
    private int $tel_no;
    private string $departure_date;

    public const TABLE = 'tbl_ticket';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public static function getTable()
    {
        return self::TABLE;
    }

    public function getNumOfTickets()
    {
        $sql = "SELECT COUNT(*) as `total` FROM {$this->table}";

        return $this->db
            ->query($sql, [])
            ->find()['total'] ?? 0;
    }

    /**
     * Returns the number of seats paid for under the provided purchase.
     * 
     * @param $purchase_id - ID of the purchase
     * 
     * @return array
     */
    public function getSeatNumbers($purchase_id)
    {
        $sql = "SELECT seat_number FROM `tbl_ticket` WHERE `purchase_id`=?";

        return $this->db
            ->query($sql, [$purchase_id])
            ->all();
    }

    public function getBookedSeats($route, $departure_date)
    {
        $seats_sql = "SELECT `seat_number` FROM {$this->table} WHERE `departure_date` = ?
                AND `purchase_id` IN (SELECT `purchase_id` FROM " . Purchase::TABLE . " WHERE
                `route_id` = ?)";

        return $this->db
            ->query($seats_sql, [$departure_date, $route])
            ->all();
    }
}
