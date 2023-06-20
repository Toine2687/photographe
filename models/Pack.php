<?php

class Pack
{
    private int $packs_id ;
    private string $label;
    private string $duration;
    private int $price;
    private string $created_at;
    private string $updated_at;
    private string $deleted_at;
    private string $content;


    //constructor
    public function __construct(string $label, string $duration, string $content, int $price,string $created_at='', string $updated_at='', string $deleted_at='')
    {
        $this->label = $label;
        $this->price = $price;
        $this->duration = $duration;
        $this->content = $content;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }
    //getters & setters
    public function set_id($id)
    {
        $this->packs_id  = $id;
    }
    public function get_id(): int
    {
        return $this->packs_id ;
    }

    public function set_label($label)
    {
        $this->label = $label;
    }
    public function get_label(): string
    {
        return $this->label;
    }

    public function set_price($price)
    {
        $this->price = $price;
    }
    public function get_price(): int
    {
        return $this->price;
    }

    public function set_duration($duration)
    {
        $this->duration = $duration;
    }
    public function get_duration(): string
    {
        return $this->duration;
    }

    public function set_content($content)
    {
        $this->content = $content;
    }
    public function get_content(): string
    {
        return $this->content;
    }

    public function set_created_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function get_created_at(): string
    {
        return $this->created_at;
    }

    public function set_updated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function get_updated_at(): string
    {
        return $this->updated_at;
    }

    public function set_deleted_at($deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
    public function get_deleted_at(): int
    {
        return $this->deleted_at;
    }

    // Méthodes ----------------------------

    public function add(){
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `packs` (`label`, `duration`, `price`, `content`) VALUES (:label, :duration, :price, :content);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':label', $this->label);
        $sth->bindValue(':duration', $this->duration);
        $sth->bindValue(':price', $this->price);
        $sth->bindValue(':content', $this->content);
        return ($sth->execute());
    }

    public static function isExist($label)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `label` FROM `packs` WHERE `label`=:label";
        $sth = $db->prepare($sql);
        $sth->bindValue(':label', $label);
        $sth->execute();
        $fetch = $sth->fetch();
        return $fetch;
    }

    public static function get($id)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT * FROM `packs` WHERE `packs_id` = :id;";
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
        $sql = "SELECT * FROM `packs`;";
        $sth = $db->query($sql);
        // $sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $fetch = $sth->fetchAll();
        return $fetch;
    }
}