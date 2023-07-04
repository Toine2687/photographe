<?php

class Article
{
    private int $articles_id;
    private string $title;
    private string $main_picture;
    private string $description;
    private string $content;
    private int $users_id;
    private string $created_at;
    private string $updated_at;
    private string $deleted_at;


    //constructor
    public function __construct(string $title, string $description, string $content, string $main_picture, int $users_id, string $created_at = '', string $updated_at = '', string $deleted_at = '')
    {
        $this->title = $title;
        $this->main_picture = $main_picture;
        $this->description = $description;
        $this->content = $content;
        $this->users_id = $users_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }

    public function set_id($id)
    {
        $this->articles_id = $id;
    }
    public function get_id(): int
    {
        return $this->articles_id;
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

    public function set_description($description)
    {
        $this->description = $description;
    }
    public function get_description(): string
    {
        return $this->description;
    }

    public function set_content($content)
    {
        $this->content = $content;
    }
    public function get_content(): string
    {
        return $this->content;
    }

    function set_users_id($users_id)
    {
        $this->users_id = $users_id;
    }
    function get_users_id()
    {
        return $this->users_id;
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

    public function add()
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = 'INSERT INTO `articles` (`title`, `description`, `content`, `main_picture`, `users_id`) VALUES (:title, :description, :content, :main_picture, :users_id);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':title', $this->title);
        $sth->bindValue(':description', $this->description);
        $sth->bindValue(':content', $this->content);
        $sth->bindValue(':main_picture', $this->main_picture);
        $sth->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);

        return ($sth->execute());
    }

    public static function isExist($title)
    {
        $instance = Singleton::getInstance();
        $db = $instance->sConnect();
        $sql = "SELECT `title` FROM `articles` WHERE `title`=:title";
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
        $sql = "SELECT `users`.`firstname`, `users`.`lastname`, `articles`.`articles_id`, `title`, `description`, `articles`.`created_at`,`articles`.`content`, `articles`.`updated_at`  
        FROM `articles` 
        INNER JOIN `users` 
        ON `users`.`users_id` = `articles`.`users_id` 
        WHERE `articles_id` = :id;";
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
        $sql = "SELECT `users`.`firstname`, `users`.`lastname`, `articles`.`articles_id`, `title`, `description`, `articles`.`created_at`, `articles`.`updated_at`  
        FROM `articles` 
        INNER JOIN `users` 
        ON `users`.`users_id` = `articles`.`users_id`";
        $sth = $db->query($sql);
        $fetch = $sth->fetchAll();
        return $fetch;
    }
}
