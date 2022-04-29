const form = document.querySelector('.signup form'),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-txt");


form.onsubmit = (e) => {
    e.preventDefault(); //Prevenindo o comportamento padrão do formulário
}

continueBtn.onclick = () => {
    //Ajax
    let xhr = new XMLHttpRequest(); //criando um objeto do tipo XML
    xhr.open("POST", "php/signup.php", true); //abrindo uma conexão com o servidor
    xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    if (data == "success") {
                        location.href = "users.php";
                    } else {
                        errorText.style.display = "block";
                        errorText.textContent = data;
                    }
                }
            }
        }
        //Agora vou enviar os dados do formulário através do Ajax para o PHP
    let formData = new FormData(form); //Criando um novo objeto do tipo formData
    xhr.send(formData); //Enviando os dados para o PHP
}