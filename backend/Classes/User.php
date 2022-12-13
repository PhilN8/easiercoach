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
}
