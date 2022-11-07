<?php

    $cartItems = [];
    $records = [];
    $msg = "Din indkøbskurv:";
    $carts = DB::selectByParam("carts", "id", "user_id", $userId);
   
    if(count($carts) > 0) {
        $cart = end($carts);
        $cartId = $cart->id ?? null;
        if ($cartId) {
            $cartItems = DB::selectByParam("cart_items", "*", "cart_id", $cartId);
        } 
    }else {
        $msg = "Din indkøbskurv er tom";
    }


    if (count($cartItems) > 0) {
        foreach ($cartItems as $cartItem) {
            $rec = DB::selectByParam("records", "*", "id", $cartItem->record_id);
            // merging cartItemID with record object
            $records[] = (object) array_merge((array) end($rec), ["cartItemId" => $cartItem->id]);
        }
    }
?>
<h4>Hej <?=$user?></h4>
<h4><?=$msg?></h4>
<button id="overLayBtn" onclick="closeOverlay()">X</button>
<table class="table" id="cartTable">
<thead>
    <tr>
      <th scope="col">Record ID</th>
      <th scope="col">Order Item No</th>
      <th scope="col">Title</th>
      <th scope="col">Artist</th>
      <th scope="col">Price</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($records && count($records) > 0) {
        foreach($records as $record) {
    ?>
    <tr>
      <th scope="row"><?=$record->id ?? ""?></th>
      <td><?=$record->cartItemId ?? "" ?></td>
      <td><?=$record->title ?? ""?></td>
      <td><?=$record->artist ?? ""?></td>
      <td><?=$record->price ?? ""?></td>
      <td><button class="btn btn-danger" onclick="deleteRecord(this)" type="records" id="<?=$record->cartItemId ?>">Fjern</button></td>
    </tr>
    <?php
        }
    }
    ?>
  </tbody>
</table>
<script>
     function deleteRecord(el) {
        var recId = $(el).attr("id") ?? null;
        if (recId) {
            swal({
                    icon: 'info',
                    title: 'Sikker?',
                    text: 'Vil du fjerne LP\'en fra din kurv.',
                    buttons: ["Nej", "Ja tak"]
                }).then((remove) => {
                    if (remove) {
                        $.post("includes/handlers/cart.php",
                        {
                            action: "delete",
                            itemId: recId
                        },
                        function(data){
                            if (data == 1) {
                                swal({
                                    icon: 'info',
                                    title: 'Slettet',
                                    text: 'LP\'en er slettet fra din kurv.',
                                }) .then((refresh) => {                                    
                                    $(el).parents("tr").remove();
                                })
                            }  
                        })

                    }        
                }) 
        } else {
            swal({
                icon: 'error',
                title: 'Øv, noget gik galt!',
                text: 'LP\'en er ikke blevet slettet.',
            })
        }
     }
</script>