<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include_once('../dbConnection.php');

    


    // Cheking Email Already Registered
    if(isset($_POST['checkemail']) && isset($_POST['stuemail'])){
        $stuemail = $_POST['stuemail'];

        $sql = "SELECT stu_email FROM student WHERE stu_email = '".$stuemail."'";
        $result = $conn->query($sql);
        $row = $result->num_rows;
        echo json_encode($row);
    }

    // Insert Student
    if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])){
        $stuname = $_POST['stuname'];
        $stuemail = $_POST['stuemail'];
        $stupass = $_POST['stupass'];

        $sql = "INSERT INTO student(stu_name, stu_email, stu_pass, stu_img) VALUES('$stuname', '$stuemail', '$stupass', '../images/stu/default.png')";
        if($conn->query($sql) == TRUE){
            echo json_encode("OK");
        }else{
            echo json_encode("Failed");
            // echo json_encode($conn->error);
        }
    }

    // Student Login 
    if(!isset($_SESSION['is_login'])){
        if(isset($_POST["checkLogEmail"]) && isset($_POST["stuLogEmail"]) && isset($_POST["stuLogPass"])){
            $stuLogEmail = $_POST["stuLogEmail"];
            $stuLogPass = $_POST["stuLogPass"];
            
            $sql = "SELECT stu_email FROM student WHERE stu_email = '".$stuLogEmail."' AND stu_pass = '".$stuLogPass."'";

            $result = $conn->query($sql);
            $row = $result->num_rows;
            if($row == 1){
               $sessionId = session_id();
                $sql = "INSERT INTO sessions(session_id, is_login, stuLogEmail) VALUES('$sessionId','1', '$stuLogEmail')";
                if($conn->query($sql) == TRUE){
                    echo json_encode($row);                    
                    $_SESSION['is_login'] = true;
                    $_SESSION['stuLogEmail'] = $stuLogEmail;
                    setcookie("session_id", session_id(), time() + (86400 * 30), "/");
                }
                else{
                    echo json_encode($row);
                }
            }else if($row == 0){
                echo json_encode($row);
            }
        }
    }
?>
