<?php

namespace Classes;

// include "../../autoload.php";

use Classes\Model;

class Ticket extends Model
{

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

    /**
     * Returns the booked seats for a particular route for the specified date
     * 
     * @param int $route_id
     * @param string $departure_date
     * 
     * @return array $booked_seats
     */
    public function getBookedSeats($route_id, $departure_date)
    {
        $seats_sql = "SELECT `seat_number` FROM {$this->table} WHERE `departure_date` = ?
                AND `purchase_id` IN (SELECT `purchase_id` FROM " . Purchase::TABLE . " WHERE
                `route_id` = ?)";

        return $this->db
            ->query($seats_sql, [$departure_date, $route_id])
            ->all();
    }

    /**
     * Saves all booked tickets for a particular purchase
     * 
     * @param Purchase $purchase
     * @param array $seats
     * 
     */
    public function bookSeats($purchase, $seats)
    {
        $id = $purchase->purchase_id;
        $date = $purchase->departure_date;

        foreach ($seats as $seat) {
            $sql = "INSERT INTO {$this->table}(`purchase_id`, `seat_number`, `departure_date`)
                    VALUES(?, ?, ?)";

            $this->db->query($sql, [$id, $this->clean($seat), $date]);
        }

        return $id;
    }
}


// (new Ticket)->bookSeats(new Purchase([2, '5-6-2012']), range(1, 10));
