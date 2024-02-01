<?php

namespace utils\poo;

use PDO;
use PDOException;

class Database
{
    public function connect()
    {
        global $PDO;
        $dsn = "mysql:host=mariadb;dbname=website";

        try {
            $PDO = new PDO($dsn, "root", "root");
        } catch(PDOException $e) {
            echo "Connection failed";
        }
    }


    public function insert($table, $fields, $values)
    {
        global $PDO;

        $str_field = "";
        $str_value = "";

        foreach($fields as $field)
        {
            if(end($fields) == $field)
            {
                $str_field .= "$field";
                $str_value .= "?";
            } else {
                $str_field .= "$field ,";
                $str_value .= "?,";

            }
        }

        $request = $PDO->prepare("INSERT INTO $table($str_field) VALUE ($str_value)");
        $request->execute($values);

    }

    public function update($table, $fields, $values, $wheres = null)
    {
        global $PDO;

        $str_field = "";
        foreach($fields as $field)
        {
            if(end($fields) == $field)
            {
                $str_field .= "$field = ?";
            } else {
                $str_field .= "$field = ? ,";
            }
        }
        $str_where = "";
        foreach($wheres as $where)
        {
            if(end($wheres) == $where)
            {
                $str_where .= "$where = ?";
            } else {
                $str_where .= "$where = ? AND ";
            }
        }

        $request = $PDO->prepare("UPDATE $table SET $str_field WHERE $str_where");
        $request->execute($values);
    }

    public function remove($table, $id)
    {
        global $PDO;

        $statement = $PDO->prepare("DELETE FROM $table WHERE id=?");
        $statement->execute([$id]);
    }

    public function isExistingUser($email, $password) : array
    {
        global $PDO;

        $request = $PDO->prepare("Select * from users where email=:email and password=:password");
        $request->execute([":email" => $email, ":password" => hash("sha256", $password)]);
        if($request->rowCount() == 0)
        {
            return [];
        }
        return $request->fetch();
    }

    public function getUser($id)
    {
        global $PDO;

        $request = $PDO->prepare("Select *, roles.name as rolename, users.name as username, roles.id as roleid from users JOIN roles ON role=roles.id WHERE users.id=:id");
        $request->execute([":id" => $id]);
        if($request->rowCount() == 0)
        {
            return [];
        }
        return $request->fetch();
    }

    public function getItem($table, $id)
    {
        global $PDO;
        $request = $PDO->prepare("Select * From $table where id=?");
        $request->execute([$id]);
        return $request->fetch();
    }

    public function getRows($table)
    {
        global $PDO;
        $request = $PDO->prepare("Select * From $table");
        $request->execute();
        return $request->fetchAll();
    }

    public function linkTable($select, $table, $join_table, $value, $value_join, $id)
    {
        global $PDO;
        $request = $PDO->prepare("Select $select FROM $table as t1 INNER JOIN $join_table on $value=$value_join WHERE t1.id = $id");
        $request->execute();
        return $request->fetchAll();
    }

}