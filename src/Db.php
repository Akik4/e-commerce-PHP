<?php

namespace Utils\database;

use PDO;

class Db {
    
    public function connect()
    {
        global $database;
        try {
            $database = new PDO('mysql:host=mariadb;dbname=exercices', 'root', 'root');
        } catch (PDOException $e) {
            // tenter de réessayer la connexion après un certain délai, par exemple
        }
        return $database;
    }

    public function show_tables()
    {
        global $database;
        $request = $database->query("show tables");
        $e = $request->fetchall();
        ?><ul>
        <thead>Liste de tables</thead>
            
            <?php
        foreach ($e as $row) {
            ?>
                    <li><?= $row[0]?></li>
                    <?php
        }
        ?></ul><?php
        //echo($request->fetch()[0]);
    }

    public function insert_user($username, $password)
    {
        global $database;

        $request = $database->query("INSERT INTO users(username, password) value ('$username', '$password')");
    }

    public function insert_book($name, $price, $available, $updated_by)
    {
        global $database;

        $request = $database->query("INSERT INTO livres(name, price, available, updated_by) value ('$name', '$price', '$available', '$updated_by')");
    }

    public function get_user($username, $password) : bool
    {
        global $database;

        $request = $database->query("SELECT * FROM users WHERE username='$username' and password='$password'");
        if($request->rowCount() > 0){
            return true;
        }
        return false;
    }

    public function get_userId($username)
    {
        global $database;

        $request = $database->query("SELECT * FROM users WHERE username='$username'");
        $result = $request->fetch();
        return $result['id'];
    }

    public function get_username($id)
    {
        global $database;

        $request = $database->query("SELECT * FROM users WHERE id='$id'");
        $result = $request->fetch();
        return $result['username'];
    }

    public function get_books() : array
    {
        global $database;

        $request = $database->query("SELECT * from livres");
        if($request->rowCount() > 0)
        {
            return $request->fetchall();
        }
        return [];
    }

    public function get_book($id) : array
    {
        global $database;

        $request = $database->query("SELECT * from livres where id=$id");
        return $request->fetch();
    }

    public function update_book($id, $name, $price, $available, $updated_by)
    {
        global $database;

        $request = $database->query("UPDATE livres set name='$name', price='$price', available='$available', updated_by='$updated_by' where id=$id");

    }

    public function remove_book($id)
    {
        global $database;

        $request = $database->query("DELETE FROM livres WHERE id=$id");
    }
}
?>
