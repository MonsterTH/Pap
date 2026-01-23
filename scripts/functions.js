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