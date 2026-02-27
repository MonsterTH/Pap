// Validação no registo
function erro_register(event) 
{
    event.preventDefault(); // Previne o envio padrão do formulário

    var erro = document.getElementById("erro");
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

// Validação no login
function erro_login(event) 
{
    event.preventDefault(); // Previne o envio padrão do formulário

    var erro = document.getElementById("erro");

    const form = document.getElementById("login");
    const formdata = new FormData(form);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "login.php", true);
    xmlhttp.onload = function ()
    {
        if (xmlhttp.status === 200)
        {
            if (xmlhttp.responseText.trim() === "ok")
            {
                window.location.href = "../home.php";
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

// Validação user
function del_user(event)
{
    event.preventDefault(); // Previne o envio padrão do formulário

    var erro = document.getElementById("erro");

    const form = document.getElementById("delete");
    const formdata = new FormData(form);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "user_del.php", true); 
    xmlhttp.onload = function ()
    {
        if (xmlhttp.status === 200)
        {
            if (xmlhttp.responseText.trim() === "ok")
            {
                window.location.href = "../index.html";
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

// Atualização do user
function erro_user(event) 
{
    event.preventDefault(); // Previne o envio padrão do formulário

    var erro = document.getElementById("erro");
    var pass = document.getElementById("pass_new").value.trim();
    var pass_rep = document.getElementById("pass_rep").value.trim();

    if (pass !== pass_rep) 
    {
        erro.textContent = "As senhas novas não coincidem";
        erro.style.color = "red";
        return;
    } 

    const form = document.getElementById("user_form");
    const formdata = new FormData(form);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "user_update.php", true);

    xmlhttp.onload = function () 
    {
        if (xmlhttp.status === 200) 
        {
            if (xmlhttp.responseText.trim() === "ok") 
            {
                window.location.href = "../home.php";
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

function loadPost(id) 
{
    fetch("../Feed/scripts/getpost.php?id=" + id)

    
        .then(response => response.json())
        .then(data => {

            if (data.error) {
                alert("Post não encontrado");
                return;
            }

            document.getElementById("PostName").innerText = data.Name;
            document.getElementById("PostContent").innerText = data.Content;
            document.getElementById("PostDate").innerText = data.Date;

        })
        .catch(err => console.error("Erro ao carregar post:", err));
}

function loadPlayer(id) 
{
    fetch("getplayers.php?id=" + id)
        .then(response => response.json())
        .then(data => {
            document.getElementById("playerName").innerText = data.Name;
            document.getElementById("playerBirth").innerText = data.Birth_date;
            document.getElementById("playerDesc").innerText = data.About;
        })
        .catch(err => console.error("Erro ao carregar jogador", err));
}


function erro_birth(event)
{
    event.preventDefault(); // Previne o envio padrão do formulário

    var erro = document.getElementById("erro");
    var birth = document.getElementById("birth").value.trim();

    if (isNaN(Date.parse(birth)) || new Date(birth) >= new Date())
    {
        erro.textContent = "Data de nascimento inválida";
        erro.style.color = "red";
        return;
    }

    const form = document.getElementById("player_form");
    const formdata = new FormData(form);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "scripts/PlayerRegister.php", true);

    xmlhttp.onload = function () 
    {
        if (xmlhttp.status === 200) 
        {
            if (xmlhttp.responseText.trim() === "ok") 
            {
                erro.textContent = "Jogador adicionado com sucesso!";
                erro.style.color = "green";
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

function erro_news(event)
{
    event.preventDefault(); // Previne o envio padrão do formulário

    var erro = document.getElementById("erro");
    var sel = document.querySelector('input[name="Cat"]:checked');

    if (!sel) {
        erro.textContent = "Selecione uma categoria.";
        erro.style.color = "red";
        return;
    }

    const form = document.getElementById("news_form");
    const formdata = new FormData(form);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "scripts/NewsAppend.php", true);

    xmlhttp.onload = function () 
    {
        if (xmlhttp.status === 200) 
        {
            if (xmlhttp.responseText.trim() === "ok") 
            {
                erro.textContent = "Notícia adicionada com sucesso!";
                erro.style.color = "green";
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