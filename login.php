<?php
    session_start();
    $usuarioLogado = isset($_SESSION['logado']) ?  $_SESSION['logado'] : false;

    if($usuarioLogado== true){
        header('location: index.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <main>
    <nav>
      <ul>
          <li class="active">Entrar</li>
          <li><a href="cadastro.php">Cadastrar</a></li>
      </ul>
    </nav>

    <div class="container">
      <div class="apresent">

        <form action="logar.php" method="post">
          <div class="cx_input"><input type="email" name="email">  <label for="email">E-mail</label></div>
          <div class="cx_input senha"><input type="password" name="senha" id="txtPass">  <label for="email">Senha</label> <img src="img/eye.svg" alt="" id="eye"></div>
          <a href="">Esqueceu a senha?</a>
          <div class="btnEntrar">
          <input type="submit" value="Entrar" class="entrar"><i class="bi bi-arrow-right"></i>
          </div>
          
        </form>
      </div>
      

      <div class="apresent">
        <h1>SCRUM <i class="bi bi-diagram-2"></i></h1>
        <p>
          Sistema de acompanhamento de Sprints.
          Além de salvar as Sprints
          O sistema conta com a geração do gráfico de burndown
        </p>
      </div>
    </div>
  </main>

</body>






<script>
  const txtPass = document.getElementById('txtPass');
  const btn = document.getElementById('eye');
  var contador = 0;
  
  let texPassword ={
    'text': (el)=>{el.setAttribute('type','password')},
    'password': (el)=>{el.setAttribute('type','text')},
  }

  btn.addEventListener('click', function(){
    contador++;
    texPassword[txtPass.type](txtPass);
    if(contador%2==1){
      btn.setAttribute('src', 'img/eye-slash.svg');
    }
    else{
      btn.setAttribute('src', 'img/eye.svg');
    }
    
  })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>