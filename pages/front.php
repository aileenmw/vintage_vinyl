<?php 
    $genres = DB::selectValuesFromTable("genres", "*" );
?>
<main>
    <div class="frame">
    <div class="vintage_vinyl">vintage vinyl</div>
        <div class="content">   
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
                magna aliquam erat volutpat. Ut wisi enim ad minim veniam, 
                quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                ut aliquip ex ea commodo consequat. 
                <br/><br/>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
                magna aliquam erat volutpat
            </p>
            <ul id='ul'>
            <?php
                foreach( $genres as $genr) {
                    echo "<a href='index.php?page=genre&genre=" . $genr->name . "&id=" . $genr->id . "'><li>" . $genr->displayName . "</li></a>";
                }
            ?>
            </ul>

        </div>
    </div>
</main>
<!--<p id="demo"></p>-->
<div class="front text">
    <h2>Vinage Vinyl Online</h2>
    <p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
        sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
        magna aliquam erat volutpat. Ut wisi enim ad minim veniam, 
        quis nostrud exerci tation ullamcorper suscipit lobortis nisl
        ut aliquip ex ea commodo consequat. <br><br>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
        sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
        magna aliquam erat volutpat. Ut wisi enim ad minim veniam, 
        quis nostrud exerci tation ullamcorper suscipit lobortis nisl
        ut aliquip ex ea commodo consequat. <br><br>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
        sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
        magna aliquam erat volutpat. Ut wisi enim ad minim veniam, 
        quis nostrud exerci tation ullamcorper suscipit lobortis nisl
        ut aliquip ex ea commodo consequat. <br><br>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
        sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
        magna aliquam erat volutpat. Ut wisi enim ad minim veniam, 
        quis nostrud exerci tation ullamcorper suscipit lobortis nisl
        ut aliquip ex ea commodo consequat. <br><br>

        Se dig omkring og spørg, hvis du har brug for hjælp!<br>

        God fornøjelse!<br><br>

        <span class="names">Markus og Verner</span>
    </p>
</div>
