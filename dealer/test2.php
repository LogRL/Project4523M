<?php 
    session_start();
    $_SESSION['count_quantity'] = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    function add_to_cart(){
        //past the item_id by POST to addtocart.php by fetch
        var item_id = 1;
        fetch('addtocart.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({item_id: item_id}),
        })
        
       
    };
</script>
<body>
    <button class="btn btn-outline-success" type="button" onclick="add_to_cart()">test add to cart</button>
</body>
</html>