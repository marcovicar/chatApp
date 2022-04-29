<?php
    session_start();
    include_once "config.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
        //Verificando se o email e a senha são os mesmos no banco de dados
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){ //Se o email e a senha são os mesmos no banco de dados
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "Online";
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id']; //Usando a sessão, nós pegamos o unique_id do usuário no outro arquivo php 
                    echo "success";
                }else{
                    echo "Algo deu errado, tente novamente mais tarde";
                }
            }else{
                echo "Email ou senha incorretos!";
            }
        }else{
            echo "$email - Este email não existe!";
        }
    }else{
        echo "Por favor, preencha todos os campos!";
    }
?>