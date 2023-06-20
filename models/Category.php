<?php 

class Category{

    private int $categories_id;
    private string $title;

    // constructor
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    //setters et getters
    public function set_id($id)
    {
        $this->categories_id = $id;
    }
    public function get_id(): int
    {
        return $this->categories_id;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }
    public function get_title(): string
    {
        return $this->title;
    }
}