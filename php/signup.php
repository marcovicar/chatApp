<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
       //Verificando se o email já existe no banco de dados
       if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //Verificando se o email é válido
        //Verificando se o email já existe no banco de dados
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //Se o email já existe
                echo "$email - Este email já está cadastrado!";
            }else{
                //Verificando se o usuário enviou uma imagem ou não
                if(isset($_FILES['image'])){ //Se o Arquivo foi enviado
                    $img_name = $_FILES['image']['name']; //Pegando o nome do arquivo de imagem enviado
                    $tmp_name = $_FILES['image']['tmp_name']; //Pegando o nome temporário do arquivo de imagem enviado
    
                    $img_explode = explode('.', $img_name); //Pegando a extensão do arquivo de imagem enviado
                    $img_ext = end($img_explode); //Pegando a extensão do arquivo de imagem enviado
    
                    $extensions = ['png', 'jpg', 'jpeg']; //Extensões permitidas

                    if(in_array($img_ext, $extensions) === true){ //Se a extensão da imagem enviada estiver entre as permitidas 
                        $time = time(); //Pegando o tempo/hora atual
                                        //Nós pegamos o tempo atual para que o nome do arquivo de imagem seja único
                                        //Pois renomeamos o arquivo de imagem para um nome único para não haver conflitos usando o time()
                        
                        $new_img_name = $time.$img_name; //Novo nome da imagem

                        if(move_uploaded_file($tmp_name, "../img/".$new_img_name)){ //Se a imagem for movida com sucesso para a pasta IMG
                            $status = "Online"; //Status do usuário depois de logado
                            $random_id = rand(time(), 10000000); //Gerando um número aleatório para o id do usuário
                            $encrypt_pass = md5($password); //Encriptando a senha do usuário
                            //Realizando a inserção dos dados do usuário no banco de dados
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");

                            if($sql2){ //Se a inserção dos dados do usuário no banco de dados foi realizada com sucesso
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //Usando a sessão, nós pegamos o unique_id do usuário no outro arquivo php 
                                    echo "success";
                                }
                            }else{
                                echo "Erro ao cadastrar usuário!";
                            }
                        }
                    }else{
                        echo "Por favor, envie uma imagem válida -  (jpg, jpeg ou png)";
                    }

                }else{
                    echo "Por favor, selecione uma imagem!";
                }
            }
       }else{
           echo "$email - Este email não é valido!";
       }    
    }else{
        echo "Por favor, preencha todos os campos!";
    }
?>