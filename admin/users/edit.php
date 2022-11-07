<?php
    
    spl_autoload_register(function ($class_name) {
        include "../../classes/" . $class_name . '.php';
    });

    $id = $_POST['id'] ?? null;
    $type = $_POST['type'] ?? null;

    if ($id) {
    $users = DB::selectByParam( $type, "*", "id", $id) ?? null;
    if (count($users) > 0) {
        $user = end($users);
    }
?>
    <form action="" method="post"  class="edit_form">
        <h3>ID: <?=$id?>  Opdatér Bruger</h3>
        <p onclick="closeFormOverlay(this)" class="overlayFormBtn" id="edit_role_btn">X</p>
        <div class="form-group" id="c_title">
            <label>Fornavn</label>
            <input type="text" class="form-control" name="fName" placeholder="<?=$user->fName?>">
        </div>
        <div class="form-group">
            <label>Efternavn</label>
            <input type="text" class="form-control" name="lName" placeholder="<?=$user->lName?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="<?=$user->email?>">
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Role
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
                            $roles = DB::selectValuesFromTable("role", "*");
                            $thisRoleId = $user->role_id ?? "";
                            $userRoles = DB::selectByParam("role", "name", "id", $thisRoleId);
                            $userRole = end($userRoles) ?? null;
                            $userRoleName = $userRole->name ?? "";
                            
                $roles = DB::selectValuesFromTable("role", "*");
                foreach ($roles as $role) {
            ?>
                <p onclick="tranferValue(this, 'role', 'e')" value="<?=$role->id?>" display="<?=$role->name?>" class="dropdown-item"><?=$role->name?></p>
            <?php
                }
            ?>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="e_role" name="role_edit" hidden>
                <input type="text" id="e_role_display" disabled>
            </div>        
        </div>
        <button onclick="formSubmit( this, 'users', 'edit')" type="submit" id="<?=$id?>" class="btn btn-primary">Submit</button>
    </form>
    <?php
        } else {
            echo "<h4>Something went wrong</h4>";
        }
    ?>