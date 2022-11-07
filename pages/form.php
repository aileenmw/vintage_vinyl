<div class="form_wrapper">
    <?php
        $form = $_GET['form'] ?? "login"; 

        $root = dirname( __DIR__ );
        $root = str_replace('\\', '/', $root);
        $form =  $form . ".php";

        include $root . "/includes/forms/" . $form;
    ?>
</div>