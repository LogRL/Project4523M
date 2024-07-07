<?php
    $total_weight =  $_GET['total_weight'];
    $total_count = $_GET['total_count'];
    $Mode = $_GET['shippingmethod'];
    if($Mode = "weight"){
        $url = "http://localhost:8080/ship_cost_api/".$Mode."/".$total_weight;
    }else{
       $url = "http://localhost:8080/ship_cost_api/".$Mode."/".$total_count;
    }
    echo $url;
    echo "<br>";
    echo $total_weight;
    echo "<br>";
    echo $total_count;
    echo "<br>";
    echo $Mode;
    echo "<br>";
    $ch = curl_init($url);
    echo "<br>";

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    echo $response;
    curl_close($ch);
    //decode the json response
    $result = json_decode($response);
    if($result->result =="accepted"){
        echo $result->cost;
    }else if($resut->result =="rejected"){
        echo $result->reason;
    }
?>