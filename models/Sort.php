<?php

class Sort{
    private int $articles_id ;
    private int $categories_id ;

    public function set_articles_id($id)
    {
        $this->articles_id  = $id;
    }
    public function get_articles_id(): int
    {
        return $this->articles_id ;
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