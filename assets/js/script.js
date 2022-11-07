function deleteItem (el) {
    var id = $(el).attr("id") ?? null;
    var itemType = $(el).attr("type") ?? null;
    if (id) {
        swal({
        title: "Er du sikker?",
        text: "Er du sikker på, at du vil slette en post af typen " + $(el).attr("type") + " med id " + $(el).attr("id") + "? ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.post( "admin/delete.php", 
                    {
                        table: itemType,
                        id : id
                    },
                    function(data){
                        if ( data == "1") {
                                swal("Du har slettet posten med id " + id + " af typen " +itemType , {
                                icon: "success"
                                }).then((refresh) => {
                                    if (refresh) {
                                        window.location.reload();
                                    }
                                });                           
                        }                  
                    });
            } else {
                swal("Du har ikke slettet posten med id " + id + " af typen " +itemType, {
                    icon: "error",
                });
            }
        });
    } else {
        alert("Noget gik galt. Det lader til, at id mangler.");
    }
}

/**
 * function for onclick on cart icons 
 * Adding to cart from pages genre, new_items and offers
 */
 function addToCart(el, user = null) {
    var urlPath = window.location.protocol + "//" + window.location.hostname + "/vintage_vinyl/includes/handlers/cart.php";
    if (user) {
        var itemId = $(el).attr("id"); 
        $.post( urlPath, { itemId: itemId, userId: user, action: "add" })
            .done(function( data ) {
              if (data == 1) {
                swal({
                    icon: 'success',
                    title: 'LP\'en er føjet til din kurv',
                    text: '',
                }).then((okRefresh) => {
                    window.location.reload();
                });
            } else {
                swal({
                    icon: 'error',
                    title: 'Øv, noget gik galt!',
                    text: 'LP\'en er føjet til din kurv.',
                })
            }
        });
    } else {
        swal({
            title: "Log ind",
            text: "Er du allerede kunde?",
            icon: "info",
            buttons: ["Nej, ikke endnu", "Ja, selvfølgelig"],
            dangerMode: false,
           // footer: '<a href="index.php?page=form&forms=login">Gå til Login!</a>'
        }).then((willLogin) => {
            if (willLogin) {                           
                    window.location.href = "index.php?page=form&form=login";
            } else {
                swal("Regisstrér dig i dag!", {
                    icon: "info",
                    buttons: ["Nej tak", "Ja tak!"],
                }).then((willRegister) => {
                    if (willRegister) {
                    window.location.href = "index.php?page=form&form=register";
                    }
                });
            }
        });
    }
 }

function showCart($cartId) {
    $("#overlay").css("display", "block");
 }

 function closeOverlay() {
    $("#overlay").css("display", "none"); 
    window.location.reload();
 }

// used on contact.php
function messageAnimation() {   
    $("#name").val('');
    $("#mail").val('');
    $("#msg").val('');
    
    var text = 'Tak for din besked!';
    var textElements = text.split("").map(function (c) {
        return $('<span id="' + c + '">' + c + '</span>');
    });

    var el = $('#ux_response');
    var delay = 30; // Tune this for different letter delays.
    textElements.forEach(function (e, i) {
        el.append(e);
        e.hide();
        setTimeout(function () {
            e.fadeIn(300)
        }, 470 + i * delay)
    })
}

 function IsEmail(el) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = $(el).val();
    if (!regex.test(email)) {
        swal("Email format er inkorrekt", {
            icon: "error",
        })
    }
 }

 /*//////////ADMIN//////////////*/
 // toggles crud tabeles in admin
function toggleTable(el) {

    // getting action and item which is the same property value for button->action and include->id
    let elAction = $(el).attr('action');
    let actionSplit = elAction.split("_");
    let action = actionSplit[0];
    let itemType = actionSplit[1];

    var displayNames = {"employees":"medarbejderen", "genres":"genren", "records":"LP'en", "users":"brugeren"};
    let displayName = displayNames[itemType] ?? itemType;

    switch (action) {
        case "display" :
            if ($("#display_" + itemType).hasClass("noDisplay")) {
                    $("#display_" + itemType).removeClass("noDisplay");
                    $("#display_" + itemType).addClass("displayTable");

                var objects;

                $.post("admin/" + action + ".php",
                {
                    table: itemType
                },
                function(data, status){
                        if ( status == "success") {
                        objects = data;
                        $(objects).appendTo("#display_" + itemType);
                        } else {
                            alert("Something went wrong. \nThe return status is '" + status + "'");
                        }
                });
            } else {
                $("#" + elAction).empty();
                $("#" + elAction).removeClass("displayTable");
                $("#" + elAction).addClass("noDisplay");
            }
        break;
        case "create" :
            if ($("#" + elAction).hasClass("noDisplay")) {
                $("#" + elAction).removeClass("noDisplay");
                $("#" + elAction).addClass("displayForm");
            } else {
                $("#" + elAction).removeClass("displayForm");
                $("#" + elAction).addClass("noDisplay");
            }
        break;
    }    
}

 function closeFormOverlay(el) {
    $(el).closest(".overlayForm").addClass("noDisplay");
    $(el).closest(".overlayForm").removeClass("displayForm");
 }

 
/*/////// ajax call fetching edit form ////////////*/
function getEditForm (el) {

    var id = $(el).attr("id") ?? null;
    let elAction = $(el).attr('action');
    let actionSplit = elAction.split("_");
    let action = actionSplit[0];
    let itemType = actionSplit[1];

    $.post("admin/" + itemType + "/edit.php",
    {
        id: id,
        type: itemType
    },
    function(data, status){
            // alert(data);
            if ( status == "success") {
                $("#edit_" + itemType).html(data);
            } else {
                alert("Something went wrong. \nThe return status is '" + status + "'");
            }
    });

    if ($("#" + elAction).hasClass("noDisplay")) {
        $("#" + elAction).removeClass("noDisplay");
        $("#" + elAction).addClass("displayForm");
    } else {
        $("#" + elAction).removeClass("displayForm");
        $("#" + elAction).addClass("noDisplay");
    }

}

/*/////////ajax call updating item //////////////////*/
function editItem(el, type) {

    var id = $(el).attr("id");
    $.post("admin/handlers/edit_" + type + ".php",
    {
        id: id,
        type: type
    },
    function(data){
            if ( data == "1") {
                alert("Ændringerne er gemt");
            } else {
                alert("Ups! Noget gik galt.");
            }
    });
}

function tranferValue(el, type, idLetter) {
    let value = $(el).attr('value');
    let display = $(el).attr('display');

    document.querySelector("#" + idLetter + "_" + type).value = value;
    document.querySelector("#" + idLetter + "_" + type + "_display").value = display;
}

function formSubmit(el, type, action) {

    $id = $(el).attr("id");

    var types = { 'user':"Brugeren", 'genre':"Genren" };
    var done = action == "create" ? "tilføjet" : "opdateret";

    var response = [];
    var typeRes = types[type] ?? "";
    response[1] = typeRes + ' er ' + done;
    response[0] = 'Noget gik galt\n' + typeRes + ' er IKKE ' + done;

    var form = $(el).closest("form");
    var formInput = $(form).serializeArray();
    var jsonData = JSON.stringify(formInput);

    alert(jsonData);

    $.post( "admin/handlers/" + action + "_" + type + ".php", { 
        formData: jsonData,
        id: $id
     }).done(function(data) {        

        if ( data == "1") {
            alert(data);
            alert("Ændringerne er gemt");
        } else {
            alert(data);
            alert("Ups! Noget gik galt.");
        }
    });
}
