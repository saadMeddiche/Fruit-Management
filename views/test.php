<?php

$fruits = FruitsController::getAllFruits();
$columns = FruitsController::showColumnsOfFruitsTable();
echo "<pre>";
print_r($columns);

echo "<br>";
echo "============================================================";
echo "<br>";
foreach ($columns as $column) :
    print_r($column);
endforeach;
echo "</pre>";
