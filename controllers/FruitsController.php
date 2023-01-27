<?php

class FruitsController
{
    static public function showColumnsOfFruitsTable()
    {
        $columns = Fruits::showColumns();
        return $columns;
    }

    static public function printTableOfFruits($columns)
    {
        $fruits = SELF::getAllFruits();

        echo "<div class='grid place-items-center'>";
        echo "<pre>";

        foreach ($columns as $column) :
            printf("%-10s", "$column->Field");
        endforeach;

        echo "\n";

        for ($i = 0; $i < count($fruits); $i++) {

            for ($x = 1; $x < count($fruits[$i]); $x++) {
                printf("%-10s", $fruits[$i][$x]);
            }
            echo "\n";
        }

        echo "</pre>";
        echo "</div>";
    }

    static public function addFruit($columns)
    {
        if (isset($_POST["AddFruit"])) {
            $data = [];
            
            foreach ($columns as $column) :
                array_push($data, $_POST["$column->Field"]);
            endforeach;


            Fruits::add($data, $columns);
        }
    }

    static public function getAllFruits()
    {
        $fruits = Fruits::fetchAll();

        return $fruits;
    }
}
