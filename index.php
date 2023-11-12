<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Aelia Resende</title>
</head>
<body>
  <div class="modal" id="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-footer">
        Email ou Senha incorretos, tente novamente
      </div>      
    </div>
  </div>

  <div class="modal" id="modalRed">
    <div class="modal-content" id="contentRed">
      <span class="close">&times;</span>
      <div class="modal-footer-red">
        <form action="/actions/action_Redefinir.php" method="POST">
          <input type="password" name="oldPass" id="Pass" placeholder="Digite sua senha atual"><br>
          <input type="password" name="newPass" id="Pass" placeholder="Digite a nova senha"><br>
          <input type="submit" value="enviar" id="enviarRed">
        </form>
      </div>      
    </div>    
  </div>

  <div class="modal" id="modalError">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-footer">
        Error ao redefinir senha, tente novamente.
      </div>      
    </div>
  </div>

  <div class="modal" id="modalConf">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-footer">
        Senha redefinida com sucesso!
      </div>      
    </div>
  </div>

  <div class="container">
      <div class="header">
          <img src="./assets/logo.png" alt="Aelia Resende">
      </div>
      <div class="info">
          <form action="actions/action_login.php" method="POST">
              <input type="text" placehoder="Digite seu email" name="login" required id ="nome"><br>
              <div class="pass">
                <input type="password" name="password" id="senha" required><img id="eye" onclick="trocarImagem()" src="./assets/icons/visibility_off_FILL0_wght400_GRAD0_opsz48.png"></img><br>
              </div>
              <input type="submit" id="enviar" value="Logar" onclick='confere()'>
          </form> 
      </div>
      <button id="trocaSenha" onclick="showModalRed()">Redefinir senha </button><br>
  </div>
</body>


<script>
    var imagemValida = true;
    function trocarImagem() {
      var minhaImagem = document.getElementById("eye");
      if (imagemValida) {
        minhaImagem.src = "./assets/icons/visibility_FILL0_wght400_GRAD0_opsz48.png";
        imagemValida = false;
        document.getElementById("senha").type = "text";
      } else {
        minhaImagem.src = "./assets/icons/visibility_off_FILL0_wght400_GRAD0_opsz48.png";
        imagemValida = true;
        document.getElementById("senha").type = "password";
      }
    }

    var queryString = window.location.search;

    // Remove o ponto de interrogação no início da string de consulta
    queryString = queryString.substring(1);

    // Divide a string de consulta em pares chave-valor
    var pares = queryString.split('&');

    // Cria um objeto para armazenar os valores dos parâmetros
    var parametros = {};

    for (var i = 0; i < pares.length; i++) {
        var par = pares[i].split('=');
        var chave = decodeURIComponent(par[0]);
        var valor = decodeURIComponent(par[1]);
        parametros[chave] = valor;
    }

    var modal = document.getElementById("modal");
    var modalRed = document.getElementById("modalRed");
    var modalError = document.getElementById("modalError");
    var modalConf = document.getElementById("modalConf");
    var span = document.getElementsByClassName("close")[0];
    var spanRed = document.getElementsByClassName("close")[1];
    var spanError = document.getElementsByClassName("close")[2];
    var spanConf= document.getElementsByClassName("close")[3];

    span.onclick = function() {
      modal.style.display = "none";
    }
    spanRed.onclick = function() {
      modalRed.style.display = "none";
    }
    spanError.onclick = function() {
      modalError.style.display = "none";
    }
    spanConf.onclick = function() {
      modalConf.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
      if (event.target == modalRed) {
        modalRed.style.display = "none";
      }
      if (event.target == modalError) {
        modalError.style.display = "none";
      }
      if (event.target == modalConf) {
        modalConf.style.display = "none";
      }
    }

    // Verifica o valor do parâmetro "erro"
    if (parametros.erro === "1") {
      modal.style.display = "block";
      history.replaceState({}, document.title, window.location.pathname);
    }

    if (parametros.erro === "2") {
      modalError.style.display = "block";
      history.replaceState({}, document.title, window.location.pathname);
    }

    if (parametros.erro === "3") {
      modalConf.style.display = "block";
      history.replaceState({}, document.title, window.location.pathname);
    }

    function showModalRed(){
      modalRed.style.display = "block";
    }

</script>
</html>