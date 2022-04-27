<!-- Coding by Marcovicar - github.com/marcovicar -->
<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: ../users.php");
    }
?>

<?php include_once "header.php" ?>

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
            <div class="link">Já possui uma conta? <a href="login.php">Fazer Login</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>

</body>

</html>