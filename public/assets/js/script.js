fetch("http://localhost:3000/lista-filmes")
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        console.log(data);
        document.getElementById("nome-filme").innerHTML = data.Nome;
        document.getElementById("ano").innerHTML = data.Ano;
        document.getElementById("nota").innerHTML = data.Nota;
    });
