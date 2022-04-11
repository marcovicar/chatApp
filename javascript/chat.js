const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); //Prevenindo o comportamento padrão do formulário
}

sendBtn.onclick = () => {
    //Ajax
    let xhr = new XMLHttpRequest(); //criando um objeto do tipo XML
    xhr.open("POST", "php/insert-chat.php", true); //abrindo uma conexão com o servidor
    xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    inputField.value = ""; //Limpa o campo de texto depois de inserido no banco de dados
                    scrollToBottom();
                }
            }
        }
        //Agora vou enviar os dados do formulário através do Ajax para o PHP
    let formData = new FormData(form); //Criando um novo objeto do tipo formData
    xhr.send(formData); //Enviando os dados para o PHP
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() => {
    //Ajax
    let xhr = new XMLHttpRequest(); //criando um objeto do tipo XML
    xhr.open("POST", "php/get-chat.php", true); //abrindo uma conexão com o servidor
    xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    chatBox.innerHTML = data;
                    if (!chatBox.classList.contains("active")) { //Se o chatBox não tiver a classe ativo, ele vai rolar para baixo
                        scrollToBottom();
                    }
                }
            }
        }
        //Agora vou enviar os dados do formulário através do Ajax para o PHP
    let formData = new FormData(form); //Criando um novo objeto do tipo formData
    xhr.send(formData); //Enviando os dados para o PHP
}, 500); //Essa função irá atualizar a lista de usuários a cada 500 milisegundos

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}