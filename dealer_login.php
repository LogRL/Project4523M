<?php
    require_once('./db/connet.php');

    $dealer_name = $_POST['dealer_name'];
    $dealer_pw = $_POST['dealer_pw'];

    $sql = "SELECT * FROM user WHERE deal_name = '$dealer_name' AND pwd = '$dealer_pw'";

    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) != 0)
        {
            echo "success";
            session_start();
            $rs = mysqli_fetch_array($result);
        }
        else
        {
            echo "wrong account name or password";
        }
    }
    else
    {
        echo "database connet error";
    }
    
    mysqli_close($conn);
?>