<?php

class Gallery
{
    private int $galleries_id;
    private string $shooting_date;
    private string $shooting_location;
    private string $title;
    private string $main_picture;
    private string $created_at;
    private string $sent_at;
    private string $deleted_at;


    //constructor
    public function __construct(string $title, string $shooting_date, string $shooting_location, string $main_picture)
    {
        $this->title = $title;
        $this->main_picture = $main_picture;
        $this->shooting_date = $shooting_date;
        $this->shooting_location = $shooting_location;
    }

    public function set_id($id)
    {
        $this->galleries_id = $id;
    }
    public function get_id(): int
    {
        return $this->galleries_id;
    }

    public function set_title($title)
    {
        $this->title = $title;
    }
    public function get_title(): string
    {
        return $this->title;
    }

    public function set_main_picture($main_picture)
    {
        $this->main_picture = $main_picture;
    }
    public function get_main_picture(): string
    {
        return $this->main_picture;
    }

    public function set_shooting_date($shooting_date)
    {
        $this->shooting_date = $shooting_date;
    }
    public function get_shooting_date(): string
    {
        return $this->shooting_date;
    }

    public function set_shooting_location($shooting_location)
    {
        $this->shooting_location = $shooting_location;
    }
    public function get_shooting_location(): string
    {
        return $this->shooting_location;
    }

    public function set_created_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function get_created_at(): string
    {
        return $this->created_at;
    }

    public function set_sent_at($sent_at)
    {
        $this->sent_at = $sent_at;
    }
    public function get_sent_at(): string
    {
        return $this->sent_at;
    }

    public function set_deleted_at($deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
    public function get_deleted_at(): int
    {
        return $this->deleted_at;
    }
}
