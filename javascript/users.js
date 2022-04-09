const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    //Ajax
    let xhr = new XMLHttpRequest(); //criando um objeto do tipo XML
    xhr.open("POST", "php/search.php", true); //abrindo uma conexão com o servidor
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    //Ajax
    let xhr = new XMLHttpRequest(); //criando um objeto do tipo XML
    xhr.open("GET", "php/users.php", true); //abrindo uma conexão com o servidor
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains("active")) { //Se a barra de pesquisa não estiver ativa então atualiza a lista de usuários
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); //Essa função irá atualizar a lista de usuários a cada 500 milisegundos