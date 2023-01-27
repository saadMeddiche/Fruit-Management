<?php

class Fruits
{
    static public function showColumns()
    {
        $requete = "SHOW COLUMNS FROM fruits";
        $stmt = DB::connect()->prepare($requete);

        $stmt->execute();

        $columns = $stmt->fetchAll(PDO::FETCH_BOTH);

        return $columns;
    }
    static public function add($data, $columns)
    {
        $requete = "INSERT INTO `fruits`(%s)";
        $text = "";

        for ($i = 0; $i < count($columns); $i++) {
            if ($i != count($columns) - 1) {
                $text .= '`' . $columns[$i]->Field . '`,';
            } else {
                $text .= '`' . $columns[$i]->Field . '`';
            }
        }
        $text = sprintf($requete, $text);

        $requete2 = " VALUES(%s)";
        $text2 = "";
        for ($i = 0; $i < count($data); $i++) {
            if ($i != count($data) - 1) {
                $text2 .= ':' . $columns[$i]->Field . ',';
            } else {
                $text2 .= ':' . $columns[$i]->Field . '';
            }
        }
        $text2 = sprintf($requete2, $text2);


        $requeteMAX = $text . $text2;

        $stmt = DB::connect()->prepare($requeteMAX);

        for ($i = 0; $i < count($data); $i++) {
            $stmt->bindParam(":" . $columns[$i]->Field, $data[$i]);
        }

        $stmt->execute();
    }

    static public function fetchAll()
    {

        $requete = "SELECT * FROM `fruits`";
        $stmt = DB::connect()->prepare($requete);

        $stmt->execute();

        $fruits = $stmt->fetchAll(PDO::FETCH_BOTH);

        return $fruits;
    }
}
