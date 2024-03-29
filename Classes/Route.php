<?php

namespace Classes;

use Classes\Model;

class Route extends Model
{
    public const TABLE = 'tbl_routes';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * Adds a new route to the database. Check done to ensure it does not already exist in the database
     * 
     * @param string $departure
     * @param string $destination
     * @param int $cost
     * 
     * @return bool|int
     */
    public function newRoute($departure, $destination, $cost)
    {

        if (!$this->search($departure, $destination)) {
            $new_route_sql = "INSERT INTO `{$this->table}`(`departure`, `destination`, `cost`)
                VALUES(?, ?, ?)";

            return $this->db
                ->insertWithID($new_route_sql, [
                    $this->clean($departure),
                    $this->clean($destination),
                    $cost
                ]);
        } else {
            return FALSE;
        }
    }

    protected function clean(string $location)
    {
        return ucwords(strtolower(parent::clean($location)));
    }

    public function getAllRoutes()
    {
        $query = "SELECT * FROM {$this->table} WHERE is_deleted = ?";
        $routes = $this->db
            ->query($query, [0])
            ->all();

        return $routes;
    }

    public static function all()
    {
        return (new Route)->getAllRoutes();
    }

    /**
     * Updates the cost of a ticket for the specified route
     * 
     * @param $id
     * @param $newPrice
     * 
     * @return bool
     */
    public function updateCost($id, $newPrice)
    {
        $query = "UPDATE {$this->table} SET cost = ? WHERE route_id = ?";
        $result = $this->db->upsert($query, [
            intval($newPrice),
            intval($id)
        ]);

        return $result > 0;
    }

    /**
     * Returns the route object for the specified ID
     * 
     * @param $id
     * 
     * @return Route 
     */
    public function getRoute($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE `route_id`= ?";
        $result = $this->db
            ->query($query, [$id])
            ->find();

        return $result;
    }

    /**
     * Returns the cost of a ticket for the specified route
     * 
     * @param mixed $id
     * 
     * @return int 
     */
    public function getCost($id)
    {
        $cost_sql = "SELECT `cost` FROM {$this->table} WHERE `route_id`= ?";
        $result = $this->db
            ->query($cost_sql, [$id])
            ->find();

        $cost = $result['cost'];

        return intval($cost) ?? 0;
    }

    /**
     * Returns a boolean value of whether a route exists
     * 
     * @param $departure
     * @param $destination
     * 
     * @return bool
     */
    public function search($departure, $destination)
    {
        $query = "SELECT * FROM `{$this->table}` WHERE `departure`=:departure AND `destination`=:destination";
        $result = $this->db
            ->query($query, [
                "departure" => $this->clean($departure),
                "destination" => $this->clean($destination)
            ])
            ->check();

        return $result;
    }

    /**
     * Returns the number of routes registered
     * 
     * @return int
     */
    public function getNumOfRoutes(): int
    {
        $query = "SELECT COUNT(*) as `total` FROM {$this->table} WHERE is_deleted = ?";

        return $this->db
            ->query($query, [0])
            ->find()['total'] ?? 0;
    }

    /**
     * Soft deletes a route
     * 
     * @param int $id
     * 
     * @return bool - Returns TRUE if successful, FALSE on failure
     */
    public function deleteRoute($id)
    {
        $query = "UPDATE {$this->table} SET is_deleted = ? WHERE route_id = ?";
        $result = $this->db
            ->upsert($query, [1, intval($id)]);

        return $result > 0;
    }

    public function earningsPerRoute()
    {
        $query = "SELECT `b`.`route_id`, `b`.departure, `b`.destination, SUM(`a`.`total_cost`) 
        AS `earnings` FROM " . Purchase::TABLE . " AS a INNER JOIN {$this->table} AS b 
        ON `a`.`route_id` = `b`.`route_id` GROUP BY `b`.`route_id` ORDER BY `earnings` DESC";

        return $this->db
            ->query($query)
            ->all();
    }
}
