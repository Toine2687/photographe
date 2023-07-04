<?php

class User_Pack
{
    private int $users_id;
    private int $packs_id;

    public function set_users_id($id)
    {
        $this->users_id   = $id;
    }
    public function get_users_id(): int
    {
        return $this->users_id;
    }

    public function set_packs_id($id)
    {
        $this->packs_id = $id;
    }
    public function get_packs_id(): int
    {
        return $this->packs_id;
    }

    public function __construct(int $users_id, int $packs_id,)
    {
        $this->users_id = $users_id;
        $this->packs_id = $packs_id;
    }
    // Méthodes

    // ###################### A COMPLETER / CHANGER ################################
    public static function get($users_id, $packs_id){
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'SELECT
        `users`.`users_id`, `packs`.`packs_id`
        FROM `users`
        INNER JOIN `packs` 
        ON `users`.`users_id` = `galleries`.`users_id` 
        WHERE `galleries_id` = :id;"; '; 

    }
    // ############################################################################

}