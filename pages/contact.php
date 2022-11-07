<?php ?>
<div class="contact_wrapper">
    <div id="pinBoard_wrapper">
        <img src="assets/img/pinwand/moodboard.jpg"  title="moodboard" alt="moodboard" class="img one">
        <img src="assets/img/pinwand/yellow_theme.jpg"  title="yellow_theme" alt="yellow_theme" class="img two">
        <img src="assets/img/pinwand/vinyl_cup.jpg"  title="cup of coffee" alt="cup of coffee" class="img three">
        <img src="assets/img/pinwand/tupac_vv.jpg"  title="tupac" alt="tupac" class="img four">
        <img src="assets/img/pinwand/reord_cafe.jpg"  title="record cafe" alt="record cafe" class="img five">
        <img src="assets/img/pinwand/owner.jpg"  title="Markus" alt="Markus, the owner" class="img six">
        <img src="assets/img/pinwand/customers.jpg"  title="customers" alt="customers" class="img seven">
        <img src="assets/img/pinwand/cosy.jpg"  title="cosy corner" alt="cosy corner" class="img eight">
        <img src="assets/img/pinwand/note.png"  title="note" alt="note" class="img nine">
        <img src="assets/img/pinwand/other_owner.jpg"  title="Verner" alt="Verner" class="img ten">
        <img src="assets/img/pinwand/record_circle.jpg"  title="listening circle" alt="listening circle" class="img eleven">
        <img src="assets/img/pinwand/opening.jpg"  title="opening" alt="opening" class="img twelf">
        <img src="assets/img/pinwand/yellow_pin.png"  title="pin" alt="pin" class="pin one">
        <img src="assets/img/pinwand/yellow_pin.png"  title="pin" alt="pin" class="pin two">
        <img src="assets/img/pinwand/yellow_pin.png"  title="pin" alt="pin" class="pin three">
        <img src="assets/img/pinwand/red_pin.png"  title="pin_red" alt="pin" class="pin four">
        <img src="assets/img/pinwand/red_pin.png"  title="pin_red" alt="pin" class="pin five">
        <img src="assets/img/pinwand/red_pin.png"  title="pin" alt="pin" class="pin six">
        <img src="assets/img/pinwand/blue_pin.png"  title="pin" alt="pin" class="pin seven">
        <img src="assets/img/pinwand/blue_pin.png"  title="pin" alt="pin" class="pin eight">
        <img src="assets/img/pinwand/blue_pin.png"  title="pin" alt="pin" class="pin nine">
        <img src="assets/img/pinwand/blue_pin.png"  title="pin" alt="pin" class="pin ten">
        <img src="assets/img/pinwand/red_pin.png"  title="pin" alt="pin" class="pin eleven">
        <img src="assets/img/pinwand/yellow_pin.png"  title="pin" alt="pin" class="pin twelf">
        <img src="assets/img/pinwand/yellow_pin.png"  title="pin" alt="pin" class="pin thirteen">
        <img src="assets/img/pinwand/blue_pin.png"  title="pin" alt="pin" class="pin fourteen">
        <img src="assets/img/pinwand/yellow_pin.png"  title="pin" alt="pin" class="pin fifteen">
        <img src="assets/img/pinwand/red_pin.png"  title="pin" alt="pin" class="pin sixteen">
        <img src="assets/img/pinwand/red_pin.png"  title="pin" alt="pin" class="pin seventeen">

            <label for="name" id="label_name" class="input"> Hvad hedder du?</label>
            <input type="text" name="name" id='name'class="input" required>
            <label for="email" id="label_email" class="input">Skriv din email her:</label>
            <input onfocusout="IsEmail(this)" type="email" name="email" id='mail' class="input">
            <label for="question" id="label_question" class="input">Hvad kan vi hjælpe dig med?</label>
            <textarea rows="8" cols="50" id='msg' name="message" class="input" required>
            </textarea>
            <button onclick="sendMail(this)" class="send" id="post_btn">SEND</button>
            <button id='bg_btn'><span>Click me!</span></button>
            <div id="ux_response"></div>
    </div>
</div>
<script>
    // var btn = document.getElementById('post_btn');
    // btn.addEventListener('click', function () {
        
    //     document.getElementById('msg').value  = '';
    //     document.getElementById('name').value = '';
    //     document.getElementById('mail').value = '';
    //     messageAnimation();
    // });

 
    var sitePath = window.location.origin + "/vintage_vinyl/"; 
    var path = sitePath + "assets/img/bg/";

    $('#bg_btn').on('click', function () {

    var gibson = path + 'gibson_r.jpg';
    var red = path + 'red.jpg';
    var circles = path + 'circles.jpg';
    var grafitti = path + 'grafitti.jpg';
    var pattern = path + 'pattern.jpg';

        if ($('body').css("background-image") == 'url("' + circles + '")') {
            $('body').css("background-image", "url('" + gibson + "')");
            $('main').css("margin", "auto");
        } else if ($('body').css("background-image") == 'url("' + gibson + '")') {
            $('body').css("background-image", "url('" + red + "')");
            $('main').css("margin", "auto");
        } else if  ($('body').css("background-image") == 'url("' + red + '")') {
            $('body').css("background-image", "url('" + grafitti + "')");
            $('main').css("margin", "auto");
        } else if  ($('body').css("background-image") == 'url("' + grafitti + '")') {
            $('body').css("background-image", "url('" + pattern + "')");
            $('main').css("margin", "auto");
        } else if  ($('body').css("background-image") == 'url("' + pattern + '")') {
            $('body').css("background-image", "url('" + circles + "')");
            $('main').css("margin", "auto");
        }
    });

</script>