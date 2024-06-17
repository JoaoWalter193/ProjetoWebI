<?php 


    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: login.php');
    }
include_once('config.php');
$email = $_SESSION['email'];
$id=1; // id de testes do produto
//pegar produtos do banci
$sqlP = "SELECT * FROM produtos WHERE id = '$id'";
$resultP= $connection->query($sqlP);

if ($resultP->num_rows > 0) {
$produto = $resultP->fetch_assoc();
} else { echo"ERRO PROD"; }

//pegar cliente do banco
$sqlC = "SELECT * FROM usuarios WHERE email = '$email'";
$resultC= $connection->query($sqlC);
if ($resultC->num_rows > 0) {
$cliente = $resultC->fetch_assoc();
} else { echo "ERRO CLIENTE"; }

//api para gerar QRCODE
$url ="https://gerarqrcodepix.com.br/api/v1?";

$nome = "Sticks&Rocks";
$cidade = "Curitiba";
$chave = "07762141952";
$saida = "br";
$valor = $produto['preco'];


$url .= 'nome=' . urlencode($nome);
$url .= '&cidade=' . urlencode($cidade);
$url .= '&chave=' . urlencode($chave);
$url .= '&valor=' .urlencode($valor);
$url .= '&saida=' . urlencode($saida);

//BRCODE (PIX COPIA E COLA)
$brCode = file_get_contents($url);
$brCodeData = json_decode($brCode,true);
$brCode = $brCodeData['brcode'];
//GERAR IMAGEM A PARTIR DO BR CODE
$url2 ="https://gerarqrcodepix.com.br/api/v1?";
$url2 .= 'brcode=' . urlencode($brCode);

$qrCode = file_get_contents($url2);
$qrCode64 = base64_encode($qrCode);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/estiloCompra.css">
    <script src="https://kit.fontawesome.com/03e61e10fd.js" crossorigin="anonymous"></script>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento-S&R</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="img_header">
                <img src="Imagens/Logo.png" id="logo">
            </div>
            <div class="texto">
                <h1 id="titulo"><b>STICKS & ROCKS-PAGAMENTO PIX</b></h1>
            </div>
            <div class="cancelar">
                <input type="submit" value="CANCELAR" onclick="voltarMenu()">
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="qrCodeCC">
                <div class="qrCode">
                    <img src= "data:image/png;base64, <?php echo $qrCode64?>" id="qrcode">
                </div>
                <div class="CC">
                    <i class="fa-regular fa-clipboard" onclick="copiarCode()"></i>
                    <input type="submit" value="Copia e Cola" onclick="copiarCode()">
                </div>
            </div>
            <div class="dados">
                <h1>Nome: <?php echo $cliente['nome']?></h1>
                <h1>CPF: <?php echo $cliente['cpf']?></h1>
                <h1>Produto: <?php echo $produto['nome']?></h1>
                <h1>Preço: R$<?php echo $produto['preco']?></h1>
            </div>
        </div>
    </main>
    <footer>
        <div class="rodape">
            <p>&copy; 2024 Sticks&Rocks. Todos os direitos reservados</p>
        </div>
    </footer>
</body>
</html>


<script>
function copiarCode() {
    var brCode = "<?php echo $brCode ?>";
    
    navigator.clipboard.writeText(brCode)
        .then(function() {
            // Adiciona a classe 'copiado' ao botão
            var copiarBotao = document.querySelector('.CC input[type="submit"]');
            copiarBotao.classList.remove('copiado'); 
            void copiarBotao.offsetWidth;
            copiarBotao.classList.add('copiado'); 
            
        })
        .catch(function(err) {
            alert('Erro ao copiar o texto: ' + err);
        });
}
function voltarMenu(){
    window.location.href="menu.php";
}
</script>

