<?php
$columns = FruitsController::showColumnsOfFruitsTable();

$columns = array_slice($columns, 1);

FruitsController::printTableOfFruits($columns);

if (isset($_POST["AddFruit"])) {

    FruitsController::addFruit($columns);
    
    Redirect::to('home');
}

?>

<div class="grid gap-y-2 place-items-center">

    <form method="POST" class="grid gap-y-2 place-items-center">

        <?php
        foreach ($columns as $column) :
        ?>
            <div class="">
                <input type="text" name="<?php echo $column->Field ?>" placeholder="<?php echo ucfirst($column->Field) ?>...">
            </div>
        <?php
        endforeach;
        ?>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="AddFruit">Add</button>

    </form>


</div>