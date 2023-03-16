<?php

namespace Classes;

class User extends Model
{

    public const TABLE = 'tbl_users';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * Returns all users
     * 
     * @return array $allUsers
     */
    public function getAllUsers()
    {
        $user_sql = "SELECT * FROM {$this->table} WHERE `is_deleted` = ?";

        return $this->db
            ->query($user_sql, [0])
            ->all();
    }

    public static function all()
    {
        return (new User)->getAllUsers();
    }

    public function authenticate($username, $password)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `user_name`= ?";

        $authCheck =  $this->db
            ->query($sql, [
                $this->clean($username),
            ])
            ->find();


        if (password_verify($password, $authCheck['password'] ?? "")) {
            unset($authCheck['password']);
            return $authCheck;
        }

        return FALSE;
    }

    /**
     * Returns the number of admins
     * 
     * @return int
     */
    public function getAdminCount()
    {
        $total_admins_sql = "SELECT COUNT(*) as `total` FROM {$this->table} WHERE `is_deleted` = ?";

        return $this->db
            ->query($total_admins_sql, [0])
            ->find()['total'] ?? 0;
    }
}

// $user = new User();

// echo password_hash('hello', PASSWORD_DEFAULT);
// dd($user->authenticate('p_nyaga', 'hello'));
