<?php

namespace Classes;

// include_once "../../autoload.php";

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
     * @param mixed $departure
     * @param mixed $departure
     * @param mixed $departure
     * 
     * @return mixed
     */
    public function newRoute($departure, $destination, $cost)
    {

        if (!$this->search($departure, $destination)) {
            $new_route_sql = "INSERT INTO `{$this->table}`(`departure`, `destination`, `cost`)
                VALUES(?, ?, ?)";

            return $this->db
                ->upsert($new_route_sql, [
                    $this->clean($departure),
                    $this->clean($destination),
                    $cost
                ], true);
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
        $result = $this->db->query($query, [
            "departure" => $this->clean($departure),
            "destination" => $this->clean($destination)
        ])->check();

        return $result;
    }

    /**
     * 
     */
    public static function cost($id)
    {
        return (new Route)->getCost($id);
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
}
