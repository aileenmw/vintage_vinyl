    <form action="" method="post"  class="create_form">
        <h3>Opret genre</h3>
        <p onclick="closeFormOverlay(this)" class="overlayFormBtn" id="create_genres_btn">X</p>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Displayname</label>
            <input type="text" class="form-control" name="displayName">
        </div>
        <button onclick="formSubmit(this, 'genres', 'create')" type="submit" class="btn btn-primary">Submit</button>
    </form>