<?php 
   $postData = file_get_contents("php://input");
   $data = json_decode($postData, true);
    session_start();
   
    
        if (isset($_SESSION['cart'])) {
            $session_array_id = array_column($_SESSION['cart'], "item_id");
            if (!in_array($data['item_id'], $session_array_id)) {
              // Item does not exist, add new item
              $session_array = array(
                "item_id" => $data['item_id'],
                "item_name" => $data['item_name'],
                "item_image" => $data['item_image'],
                "item_desc" => $data['item_desc'],
                "weight" => $data['weight'],
                "quantity" => $data['quantity'],
                "price" => $data['price'],
                "full_product_id" => $data['category_id'] . $data['product_id']
              );
              $_SESSION['cart'][] = $session_array;
            } else {
              // Item exists, update quantity
              foreach ($_SESSION['cart'] as $key => $value) {
                if ($value["item_id"] == $data['item_id']) {
                  // Update quantity
                  $_SESSION['cart'][$key]['quantity'] += $data['quantity'];
                  break; // Stop the loop after updating
                }
              }
            }
          } else {
            // Cart does not exist, create new cart and add item
            $session_array = array(
              "item_id" => $data['item_id'],
              "item_name" => $data['item_name'],
              "item_image" => $data['item_image'],
              "item_desc" => $data['item_desc'],
              "weight" => $data['weight'],
              "quantity" => $data['quantity'],
              "price" => $data['price'],
              "full_product_id" => $data['category_id'] . $data['product_id']
        
            );
            $_SESSION['cart'][] = $session_array;
          }   
    
    
?>