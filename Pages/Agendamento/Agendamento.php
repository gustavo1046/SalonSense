<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./Agendamento.css">
    <title>Aelia Resende</title>
</head>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.html';
?>
<body>

  <!-- modal de cliente ja existente -->
  <div class="modal" id="modalError">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-footer">
        Ja existe um cliente com esse nome, Escolha um novo nome!
      </div>      
    </div>
  </div>

  <div class="modal" id="modalExc">
    <div class="modal-content-exc">
      <span class="close">&times;</span>
        <div class="modal-footer">
            <input type="tel" name="telefone" placeholder="telefone de contato" id="telefone" required><br>
            <button id="tel_button" onclick="cadastrarCliente()">Cadastrar cliente</button>
        </div>      
    </div>
  </div>
  <div class="modal" id="modalPre">
    <div class="modal-content-pre">
      <span class="closePre">&times;</span>
        <div class="modal-footer">
            Preencha todos os campos para realizar o cadastro!
        </div>      
    </div>
  </div>

  <header>
      <img src="../../assets/logo.png">
  </header>
  <div class="container">
    <form action="../../actions/action_Agendamento.php" method="POST" id="formulario">    
      <input type="text" name="nome" placeholder="nome da cliente" id="nome" pattern="[A-Za-z0-9 ]+" maxlength="30" required>
      <select name="cliente" id="cliente">
        <?php
          require_once __DIR__ ."/../../Controller/ClienteController.php";
          $cliente_controller = new ClienteController();
          $clientes = $cliente_controller->ListarClientes();
          foreach($clientes as $cliente){
            echo "<option id='option' value='".$cliente->get_nome_cliente()."'>".$cliente->get_nome_cliente()."</option>";
          }
        ?>
      </select><br>
      <input type="time" name="hora_inicio" placeholder="inicio do atendimento" id="hora_inicio" required><br>
      <input type="time" name="hora_final" placeholder="final do atendimento" id="hora_final" required><br>
      <input type="date" name="data" placeholder="data do atendimento" id="data" required><br>
      <input tyle="number" name="valor" placeholder="valor do serviço" id="valor" required><br>
      <input type="text" name="desc" placeholder="descrição" maxlength="150" id="desc" required><br>
      <input type="hidden" name="telefone" id="tel">
      <input type="hidden" name="cliente_fiel" id="cliente_fiel"> 
      <div class="radio">
        <br>
        <label>
            <input type="radio" name="opcao" value="Dinheiro"  id="opcao1" checked>
            Dinheiro
          </label>
          <label>
            <input type="radio" name="opcao" value="Cartâo" id="opcao2"> 
            Cartão
          </label>
          <label>
            <input type="radio" name="opcao" value="Pix" id="opcao3">Pix
          </label>
      </div>
      <div class="cliente">
        <input type="checkbox" name="opcao_cliente" id="opcao_cliente" onclick="MudaSubmit()">  Cadastrar cliente?
      </div>
      <input type="hidden" name="op" id ="op" value=0>
      <div class="sub">
        </form>
          <input type="submit" id="agendar" value="Agendar" onclick="clienteFixo()">
          <a href="../Home Page/HomePage.php">Voltar ao inicio</a>
      </div>
      
  </div>  
</body>
<script>
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

  var modalError = document.getElementById("modalError");
  var spanError = document.getElementsByClassName("close")[1];

  spanError.onclick = function() {
    modalError.style.display = "none";
  }

  window.onclick = function(event) {
      if (event.target == modalError) {
        modalError.style.display = "none";
      }
  }

  if (parametros.erro === "1") {
      modalError.style.display = "block";
      history.replaceState({}, document.title, window.location.pathname);
    }

  function MudaSubmit(){
    var botao = document.getElementById("agendar");
    if(botao.type == "submit"){
      botao.type = "button"
    }
    else{
      botao.type = "submit"
    }
  }

  function validateFloatInput(input) {
    // Substitua qualquer caractere não numérico (exceto ponto) por vazio
    input.value = input.value.replace(/[^0-9.]/g, '');

    // Garante que não haja mais de um ponto decimal
    const dotCount = (input.value.match(/\./g) || []).length;
    if (dotCount > 1) {
        input.value = input.value.slice(0, -1);
    }
  }

  function verificarCampos() {
    // Obtém o formulário pelo ID
    var formulario = document.getElementById("formulario");

    // Obtém todos os elementos de input dentro do formulário
    var campos = formulario.querySelectorAll("input[required]");

    // Define uma variável para rastrear se todos os campos estão preenchidos
    var todosCamposPreenchidos = true;

    // Itera por todos os campos e verifica se estão preenchidos
    for (var i = 0; i < campos.length; i++) {
      if (campos[i].value.trim() == "") {
        todosCamposPreenchidos = false;
        break; // Se encontrar um campo vazio, sai do loop
      }
    }
    return todosCamposPreenchidos;
  }

  function clienteFixo(){
    var tel = document.getElementById("opcao_cliente");
    if(tel.checked){
      document.getElementById("cliente_fiel").value = document.getElementById("data").value
      showModalDelete();
    }
  }

  function submitFormulario(){
    var formulario = document.getElementById("formulario");
    formulario.submit();
  }

  function showModalDelete(){
    var modalDelete = document.getElementById("modalExc");
    var spanDel = document.getElementsByClassName("close")[1];
    spanDel.onclick = function() {
      modalDelete.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modalDelete) {
        modalDelete.style.display = "none";
      }
    }
    modalDelete.style.display = "block";
  }

  function showModalAlert(){
    var modalPre = document.getElementById("modalPre");
    var spanPre = document.getElementsByClassName("closePre")[2];

    // Quando o usuário clicar no botão "fechar" ou fora do modal, feche-o

    spanPre.onclick = function() {
      modalPre.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modalPre) {
        modalPre.style.display = "none";
      }
    }
    modalPre.style.display = "block";
  }

  function cadastrarCliente(){
    var tel = document.getElementById("telefone").value;
    console.log(tel);
    if(tel){
      document.getElementById("tel").value = tel;
      var verifica = verificarCampos();
      if(verifica){      
        submitFormulario();
        MudaSubmit();
      }
      else{
        // alert("oi");
        showModalAlert();
      }
    }
    else{
      showModalAlert();
    }  
  }

  const selectBox = document.getElementById('cliente');
  const data= document.getElementById('data');
  
  data.addEventListener('change', function() {
    const cliente = document.getElementById('cliente_fiel');
    cliente.value = data.value;
  });

  // Adiciona um ouvinte de evento para o evento "change" no <select>
  selectBox.addEventListener('change', function() {
    const inputText = document.getElementById('nome');
    inputText.value = selectBox.value;
  });
  </script>
</html>