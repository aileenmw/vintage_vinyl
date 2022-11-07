   <?php
    
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });

    $id = $_POST['id'] ?? null;
    $type = $_POST['type'] ?? null;

    if ($id && $type) {
        $records = DB::selectByParam( $type, "*", "id", $id) ?? null;
        $record = end($records);
        if (count($records) > 0) {
            $record = end($records);
        }
    
   ?>
   <form id="data" method="post" action="admin/handlers/edit_record.php" enctype="multipart/form-data" class="edit_form">
    <h3>Opdatér LP</h3>
    <p onclick="closeFormOverlay(this)" class="overlayFormBtn" id="edit_records_btn">X</p>
        <input hidden type="text" name="id" value="<?=$record->id?>">
        <div class="form-group" id="c_title">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="<?=$record->title?>">
        </div>
        <div class="form-group">
            <label>Artist</label>
            <input type="text" class="form-control" name="artist" placeholder="<?=$record->artist?>">
        </div>
        <div class="form-group">
            <label>Desription</label>
            <input type="text" class="form-control" name="description" placeholder="<?=$record->artist?>">
        </div>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Genre
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php
                $genres = DB::selectValuesFromTable("genres", "*");
                $thisGenreId = $record->genre_id ?? "";
                $recordGenres = DB::selectByParam("genres", "displayName", "id", $thisGenreId);
                $recordGenre = end($recordGenres) ?? null;
                $recordGenreName = $recordGenre->displayName ?? "";

            foreach ($genres as $genre) {
        ?>
            <p onclick="tranferValue(this, 'genre', 'e')" value="<?=$genre->id?>" display="<?=$genre->displayName?>" class="dropdown-item"><?=$genre->displayName?></p>
        <?php
            }
        ?>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="e_genre" name="genre" hidden>
            <input type="text" id="e_genre_display" placeholder="<?=$recordGenreName?>"  disabled>
        </div>        
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.01" class="form-control" name="price" placeholder="<?=$record->price?>">
        </div>
        <div class="form-group">
            <label>Released</label>
            <input type="number" class="form-control" name="year" placeholder="<?=$record->year?>">
        </div>
        <div class="form-group">
            <label>Upload image</label>
            <input type="file" name="fileToUpload" value="" />
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input type="number" class="form-control" name="amount" placeholder="<?=$record->amount?>">
        </div>
        <button type="submit"   id="<?=$id?>" class="btn btn-primary">Submit</button>
    </form>
    <?php
        } else {
            echo "<h4>Something went wrong</h4>";
        }
    ?>

<!-- onclick="formSubmit(this,'records','edit')" -->