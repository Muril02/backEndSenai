

        function exibirEdit() {
            let idFormEdit = document.getElementById("formEdit")
            let idFormCad = document.getElementById("formCad")
            idFormEdit.classList.remove("esconder")
            idFormCad.classList.add("esconder")
        }

        function exibirCad() {
            let idFormEdit = document.getElementById("formEdit")
            let idFormCad = document.getElementById("formCad")
            idFormEdit.classList.add("esconder")
            idFormCad.classList.remove("esconder")
        }

        function pegarValores(Titulo, Autor, Ano, Genero, Quantidade, Id) {
            let titulo = document.getElementById("titulo")
            let genero = document.getElementById("genero")
            let autor = document.getElementById("autor")
            let ano = document.getElementById("ano")
            let qtde = document.getElementById("qtde")
            let id = document.getElementById("id")

            titulo.value = Titulo
            autor.value = Autor
            genero.value = Genero
            qtde.value = Quantidade
            ano.value = Ano
            id.value = Id
            
        }

