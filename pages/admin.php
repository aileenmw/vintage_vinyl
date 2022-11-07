<?php 

 if (isset($_GET['imgErr']) || isset($_GET['recErr'])) {
    $imgUploadErrors = $_GET['imgErr'] ?? "";
    $recordReturn = $_GET['recErr'] ?? 0;
    if ( $recordReturn == 1) {
        $icon =  "success";
        $title = "Success";
        $text =  "LP tabellen er opdateret";
    } else if($imgUploadErrors != "") {
        $icon =  "error";
        $title = "LP tabellen er IKKE opdateret";
        $text =  Image::$errorArr[(int)$imgUploadErrors];
    } else {
        $icon =  "error";
        $title = "Noget gik galt";
        $text =  "LP tabellen er IKKE opdateret";
    } 
    ?>
    <script>
        swal({
            icon:  "<?=$icon?>",
            title: "<?=$title?>" ,
            text:  "<?=$text?>",
        }).then((refresh) => {
            if (refresh) {
                var url = window.location.href.split("&");
                window.location.href = url[0];
            }
        });    
    </script>
    <?php
} 
?>
<div class="admin_wrapper">
    <h1>Administration</h1><br>
    <div id="message"></div>
    <h2>Lager administration</h2><br>
    <div class="admin_btn_wrapper">
        <button type="button" onclick="toggleTable(this)" action="display_records" class="btn lp_btn btn-dark">Vis og redigér LP'er</button>
        <button type="button" onclick="toggleTable(this)" action="create_records" class="btn lp_btn btn-success">Opret LP</button>
    </div>   
    <div class="noDisplay" id="display_records"></div>
    <div class="noDisplay overlayForm" id="create_records">
        <?php
          include "admin/records/create.php";
        ?>
    </div>
    <div class="noDisplay overlayForm" id="edit_records"></div><br>
    
    <h2>Bruger administration</h2><br>
    <div class="admin_btn_wrapper">
        <button type="button" onclick="toggleTable(this)" action="display_users" class="btn lp_btn btn-dark">Vis brugere</button>
        <button type="button" onclick="toggleTable(this)" action="create_users" class="btn lp_btn btn-success">Opret bruger</button>
    </div> 
    <div class="noDisplay" id="display_users"></div>
    <div class="noDisplay overlayForm" id="create_users">
        <?php
            include "admin/users/create.php";
        ?>
    </div>
    <div class="noDisplay overlayForm" id="edit_users"></div><br>

    <h2>Genre administration</h2><br>
    <div class="admin_btn_wrapper">
        <button type="button" onclick="toggleTable(this)" action="display_genres" class="btn lp_btn btn-dark">Vis Genrer</button>
        <button type="button" onclick="toggleTable(this)" action="create_genres" class="btn lp_btn btn-success">Opret Genre</button>
    </div> 
    <div class="noDisplay" id="display_genres"></div>
    <div class="noDisplay overlayForm" id="create_genres">
        <?php
            include "admin/genres/create.php";
        ?>
    </div>
    <div class="noDisplay overlayForm" id="edit_genres"></div>
</div>