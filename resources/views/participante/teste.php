<?php
    session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trabalhando com Sessões em PHP</title>
</head>

<body>
    
    <h1>Sessões em PHP</h1>
    
<a href="?produto=1&valor=10&qtd=1">Produto 1</a>
<a href="?produto=2&valor=20&qtd=1">Produto 2</a>
<a href="?produto=3&valor=35&qtd=2">Produto 3</a>    
    
<?php
    @$produto = $_GET["produto"];
    @$valor = $_GET["valor"];
    @$qtd = $_GET["qtd"];
    
    //unset($_SESSION["produto"]);
	//exit();
    if (isset($_GET["produto"])){
       if(isset($_SESSION["produto"])){
           $arr = $_SESSION["produto"];
        }else{
           $arr = array(); 
        }

        $arr[] = array("produto"=>$produto,"qtd"=>$qtd,"valor"=>$valor);
        $_SESSION["produto"] = $arr;
    }
    
    //echo "Valor do Indice 2 do meu Array:". $_SESSION["produto"][2]["valor"];
    foreach ($_SESSION["produto"] as $lista){
        echo "<br>Produto: ". $lista["produto"] . "qtd.". $lista["qtd"]. "X Valor:".$lista["valor"] . ' = '. $lista["qtd"]*$lista["valor"];
        echo '<a href="?produto='.$lista[produto].'">Remover</a>';
    }
    
    echo "<br><br> Total de Produtos na Sessão".count ($_SESSION["produto"]);
    
    //echo "<pres>";
    //print_r($_SESSION["produtos"]);
    //echo "</pres>";
   
?>
</body>
</html>