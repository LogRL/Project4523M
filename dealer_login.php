<?php
    require_once('./db/connet.php');


    $dealer_name = $_POST['dealer_name'];
    $dealer_pw = $_POST['dealer_pw'];



    $sql = "SELECT * FROM dealer WHERE dealerName = '$dealer_name' AND password = '$dealer_pw'";

    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) != 0)
        {
            echo "success";
        }
        else
        {
            echo "false";
        }

    }
    else
    {
        echo "false";
    }
    

    mysqli_close($conn);
?>