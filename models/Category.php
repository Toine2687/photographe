<?php

class Category
{

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

    public function add()
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `categories` (`title`) VALUES (:title);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $this->title);
        return ($sth->execute());
    }

    public static function isExist($title)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `title` FROM `categories` WHERE `title`=:title";
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $title);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    public static function get($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `categories_id` FROM `categories` WHERE `categories_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    public static function getAllSimple()
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `categories_id`, `title` FROM `categories`;";
        $sth = $db->query($sql);
        $fetch = $sth->fetchAll();
        return $fetch;
    }

    public static function delete($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "DELETE FROM `categories` WHERE `categories_id` = :id;";
        $sth = $db->prepare($sql);
        $sth->bindValue(':id', $id);
        return $sth->execute();
    }
}
