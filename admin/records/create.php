    <form action="admin/handlers/create_record.php" method="post" class="create_form" enctype="multipart/form-data" >
    <h3>Opret LP</h3>
    <p onclick="closeFormOverlay(this)" class="overlayFormBtn" id="create_records_btn">X</p>
        <div class="form-group" id="c_title">
            <label>Title</label>
            <input type="text" class="form-control" name="title_create" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label>Artist</label>
            <input type="text" class="form-control" name="artist_create" placeholder="Artist" required>
        </div>
        <div class="form-group">
            <label>Desription</label>
            <input type="text" class="form-control" name="description_create" placeholder="Desription" required>
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
            <p onclick="tranferValue(this, 'genre', 'c')" value="<?=$genre->id?>" display="<?=$genre->displayName?>" class="dropdown-item"><?=$genre->displayName?></p>
        <?php
            }
        ?>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="c_genre" name="genre_create" hidden>
            <input type="text" id="c_genre_display" disabled>
        </div>        
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" step=0.01 min=0 class="form-control" name="price_create" placeholder="Price" required>
        </div>
        <div class="form-group">
            <label>Released</label>
            <input type="number" class="form-control" name="year_create" placeholder="Year" required>
        </div>
        <div class="form-group">
            <label>Upload image</label>
            <input type="file" name="fileToUpload" value="" />
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input type="number" class="form-control" name="amount_create" placeholder="Amount of items" required>
        </div>
        <button type="submit" id="submit_create_record" class="btn btn-primary">Submit</button>
    </form>
  