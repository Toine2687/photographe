<?php

class User_Pack
{
    private int $users_id;
    private int $categories_id;

    public function set_users_id($id)
    {
        $this->users_id   = $id;
    }
    public function get_users_id(): int
    {
        return $this->users_id;
    }

    public function set_categories_id($id)
    {
        $this->categories_id = $id;
    }
    public function get_categories_id(): int
    {
        return $this->categories_id;
    }
}
