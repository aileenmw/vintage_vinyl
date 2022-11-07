<?php
    
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });

    $id = $_POST['id'] ?? null;
    $type = $_POST['type'] ?? null;
    
    
    if ($id) {
        $genres = DB::selectByParam( $type, "*", "id", $id) ?? null;
        $genre = end($genres);
    }
    if (count($genres) > 0) {
        $genre = end($genres);
    }

    $name = $genre->name ?? "";
    $displayName = $genre->displayName ?? "";
    $id = $genre->id;

?>
    <form class="edit_form">
        <h3>Opdatér genre</h3>
        <p onclick="closeFormOverlay(this)" class="overlayFormBtn" id="edit_genres_btn">X</p>
        <div class="form-group" id="c_title">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="<?=$name?>">
        </div>
        <div class="form-group">
            <label>Display Name</label>
            <input type="text" class="form-control" name="displayName" placeholder="<?=$displayName?>">
        </div>
        <button onclick="formSubmit(this, 'genres', 'edit')" id="<?=$id?>" class="btn btn-primary">Submit</button>
    </form>
    <?php
        // } else {
        //     echo "<h4>Something went wrong</h4>";
        // }
    ?>