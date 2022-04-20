<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
        //Verificando se o email e a senha são os mesmos no banco de dados
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){ //Se o email e a senha são os mesmos no banco de dados
            $row = mysqli_fetch_assoc($sql);
            $status = "Online";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id']; //Usando a sessão, nós pegamos o unique_id do usuário no outro arquivo php 
            echo "success";
            }
            
        }else{
            echo "Email ou senha incorretos!";
        }
 
    }else{
        echo "Por favor, preencha todos os campos!";
    }
?>