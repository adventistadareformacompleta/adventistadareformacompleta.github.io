<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página com Data e Hora</title>
</head>
<body>
    <h1>Bem-vindo!</h1>

    <?php
        // Configuração do fuso horário
        date_default_timezone_set('America/Sao_Paulo');

        // Obter a data e hora atual
        $dataHoraAtual = date('Y-m-d H:i:s');

        // Exibir a data e hora na página
        echo "<p>A data e hora atual são: $dataHoraAtual</p>";
    ?>
	
	
	<?php
echo "Hello world!";
?>
</body>
</html>
