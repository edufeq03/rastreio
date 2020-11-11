<?php
 // Conectando ao banco de dados:
 include_once("conectar.php");
 
 // Recebendo os dados a pesquisar
 $pesquisa = $_POST['email'];
?>

 <html>
 <head>
 <title>Resultado da pesquisa</title>
 </head>
 <body>
 
 <!-- Criando tabela e cabeçalho de dados: -->
 <table border="1" style='width:50%'>
 <tr>
 <th>NOME</th>
 <th>EMAIL</th>
 <th>RASTREIO</th>
 </tr>
 
 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
 $sql = "SELECT * FROM rastreio_mid WHERE email = '$pesquisa'";
 $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $nome = $registro['name'];
   $email = $registro['email'];
   $rastreio = $registro['code'];
   echo "<tr>";
   echo "<td>".$nome."</td>";
   echo "<td>".$email."</td>";
   echo "<td>".$rastreio."</td>";
   echo "</tr>";
 }
 mysqli_close($strcon);
 echo "</table>";
?>
</body>
</html>