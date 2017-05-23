<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo</title>
</head>

<body>
    <?php
    if(isset($_GET["nome"]) && !empty($_GET["nome"]) &&
                        isset($_GET["email"]) && !empty($_GET["email"])  &&  isset($_GET["pass"])  &&  !empty($_GET["pass"])){
        $nome = htmlspecialchars($_GET["nome"]);
        $email = htmlspecialchars($_GET["email"]);
        $pass = htmlspecialchars($_GET["pass"]);
        $sql = "INSERT INTO registar(nome, email, pass), VALUES(?, ?, ?)";

        $ligacao = new mysqli("localhost", "root", "", "registo");
        if($ligacao->connect_error){
            echo "<h1>Serviço indisponivel. Por favor tente mais tarde.</h1>";
        }
        else{
            if( ($instrucao=$ligacao->prepare($sql)) != FALSE){
                // s-String, i-inteiro, d-decimal, b-blob
                if($instrucao->bind_param("sss", $nome,
                                            $email, $pass)===TRUE){
                    if($instrucao->execute() === TRUE){
                        echo "<p>Foi recebido o pedido do " . $nome . " para fazer um registo no site!</p>";
                    }
                    else{
                        echo "<h1>Pedido recusado</h1>";
                    }
                }
                else{
                    echo "<h1>Dados inválidos</h1>";
                }
            }
            else{
                echo "<h1>Serviço indisponivel. Por favor tente mais tarde.</h1>";
            }
            $ligacao->close();
        }
    } else {
        echo "<p>Não aceitamos pedidos anónimos!</p>";
    }
    ?>
</body>

</html>
