// Validação de Senhas no Registo
function erro_register(event) 
{
    event.preventDefault(); // Previne o envio padrão do formulário

    var erro = document.getElementById("erro");
    var nome = document.getElementById("nome").value.trim();
    var email = document.getElementById("email").value.trim();
    var pass = document.getElementById("pass").value.trim();
    var pass_rep = document.getElementById("pass_rep").value.trim();

    if (pass !== pass_rep) 
    {
        erro.textContent = "As senhas não coincidem";
        erro.style.color = "red";
        return;
    } 

    const form = document.getElementById("registo");
    const formdata = new FormData(form);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "register.php", true);

    xmlhttp.onload = function () 
    {
        if (xmlhttp.status === 200) 
        {
            if (xmlhttp.responseText.trim() === "ok") 
            {
                window.location.href = "../login/login.html";
            } 
            else 
            {
                erro.textContent = xmlhttp.responseText;
                erro.style.color = "red";
            }
        }
    };

    xmlhttp.send(formdata);
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