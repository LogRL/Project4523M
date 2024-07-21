<?php 
    require_once('./db/connet.php');
    
    $manager_name = $_POST['manager_name'];
    $manager_pw = $_POST['manager_pw'];

    $sql = "SELECT * FROM sales_manager WHERE sm_name = '$manager_name' AND pwd = '$manager_pw'";

    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) != 0)
        {
            echo "success";
            session_start();
            $_SESSION['manager_name'] = $manager_name;
            $_SESSION['manager_pw'] = $manager_pw;
            $rs = mysqli_fetch_array($result);
            $_SESSION['sm_id'] = $rs['sm_id'];
            $_SESSION['contact_name'] = $rs['contact_name'];
            $_SESSION['contact_num'] = $rs['contact_num'];

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