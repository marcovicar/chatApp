<?php
    session_start();
    if(isset($_SESSION['unique_id'])){ //Se o usuário estiver logado ele vai para a página de chat
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline";
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("Location: ../login.php");
            }
        }else{
            header("Location: ../users.php");
        }
    }else{ //Se não estiver logado ele vai para a página de login
        header("Location: ../login.php");
    }
?>