<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include_once('dbConnection.php');
 
    $sql = "DELETE FROM sessions WHERE session_id = '$sid'";
    if($conn->query($sql) == TRUE){        
        setcookie("session_id", "", time() - (86400), "/");
        session_destroy();
        echo "<script>location.href = 'index.php'</script>";
    }else{
        echo $conn->error;
    }
?>