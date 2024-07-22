<?php
    require_once('./db/connect.php');

    $deal_name = $_POST['deal_name'];
    $dealer_pw = $_POST['dealer_pw'];

    $sql = "SELECT * FROM user WHERE deal_name = '$deal_name' AND pwd = '$dealer_pw'";

    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) != 0)
        {
            echo "success";
            session_start();
            $_SESSION['deal_name'] = $deal_name;
            $_SESSION['dealer_pw'] = $dealer_pw;
            $rs = mysqli_fetch_array($result);
            $_SESSION['deal_id'] = $rs['deal_id'];
            $_SESSION['email'] = $rs['email'];
            $_SESSION['contact_num'] = $rs['contact_num'];
            $_SESSION['fax_num'] = $rs['fax_num'];
            $_SESSION['address'] = $rs['address'];
            
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