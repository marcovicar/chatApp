<!DOCTYPE html>
<!-- Coding by Marcovicar - github.com/marcovicar -->
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DlyChat | Marcovicar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>DlyChat</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Nome</label>
                        <input type="text" name="fname" placeholder="Nome" required>
                    </div>
                    <div class="field input">
                        <label>Sobrenome</label>
                        <input type="text" name="lname" placeholder="Sobrenome" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Digite o seu email" required>
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Digite uma senha" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Selecione uma Imagem</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue para conversar">
                </div>
            </form>
            <div class="link">Já possui uma conta? <a href="#">Fazer Login</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>

</body>

</html>