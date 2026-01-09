// Validação de Senhas no Registo
function erro_pass(event) 
{
      var erro = document.getElementById("erro");
      var pass = document.getElementById("pass").value.trim();
      var pass_rep = document.getElementById("pass_rep").value.trim();

      if (pass !== pass_rep) 
      {
            erro.textContent = "As senhas não coincidem";
            erro.style.color = "red";

            // Impede o envio do formulário
            event.preventDefault();
            return false;
      } 
      else 
      {
            erro.textContent = "";
            return true;
      }
}

function confirmar() 
{
    return confirm('Tem a certeza que pretende eliminar a organização? Esta ação é irreversível!');
}

/*
// Pré-visualização de Imagem de Perfil
function previewImage() {
    const input = document.getElementById("nome_imagem");
    const preview = document.getElementById("preview");

    if (input.files && input.files[0]) {
        const file = input.files[0];

        // Garante que seja uma imagem
        if (!file.type.startsWith("image/")) {
            alert("Por favor, selecione uma imagem válida.");
            input.value = ""; // limpa input
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result; // atualiza o src
        };

        reader.readAsDataURL(file);
    }
}
    */   