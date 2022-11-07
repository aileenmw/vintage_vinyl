    <form action="" method="post" class="edit_form" id="create_user_form">
        <h3>Opret Bruger</h3>
        <p onclick="closeFormOverlay(this)" class="overlayFormBtn" id="create_user_btn" required>X</p>
        <div class="form-group" id="c_title">
            <label>Fornavn</label>
            <input type="text" class="form-control" name="fName_create" id="fName_create_input" >
        </div>
        <div class="form-group">
            <label>Efternavn</label>
            <input type="text" class="form-control" name="lName_create" required>
        </div>
        <div class="form-group">
            <label>Brugernavn</label>
            <input type="text" class="form-control" name="userName_create" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="pWord_create" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email_create" required>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Role
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
                $roles = DB::selectValuesFromTable("role", "*");            
                foreach ($roles as $role) {
            ?>
                <p onclick="tranferValue(this, 'role', 'c')" value="<?=$role->id?>" display="<?=$role->name?>" class="dropdown-item"><?=$role->name?></p>
            <?php
                }
            ?>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="c_role" name="role_create" hidden>
                <input type="text" id="c_role_display" disabled>
            </div>        
        </div>
        <button type="submit" onclick="formSubmit(this, 'user', 'create')" class="btn btn-primary">Submit</button>
    </form>
   