<?php
header('Content-Type: text/html; charset=utf-8');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST["texto"];

    function encriptarMensaje($mensaje) {
        $alfabeto = "abcdefghijklmnopqrstuvwxyz";
        $mensaje_encriptado = "";
        $longitudAlfabeto = strlen($alfabeto);
    
        for ($i = 0; $i < strlen($mensaje); $i++) {
            $letra = $mensaje[$i];
    
            $posicion = -1;
    
            for ($j = 0; $j < $longitudAlfabeto; $j++) {
                if ($alfabeto[$j] == $letra) {
                    $posicion = $j;
                    break;
                }
            }
    
            if ($posicion !== -1) {
                $nueva_posicion = ($posicion + 5) % $longitudAlfabeto;
                $letra_encriptada = $alfabeto[$nueva_posicion];
                $mensaje_encriptado .= $letra_encriptada;
            } else {
                $mensaje_encriptado .= $letra;
            }
        }
    
        return $mensaje_encriptado;
    }

    function descencriptarMensaje($mensaje) {
        $alfabeto = "abcdefghijklmnopqrstuvwxyz";
        $mensaje_desencriptado = "";
        $longitudAlfabeto = strlen($alfabeto);
    
        for ($i = 0; $i < strlen($mensaje); $i++) {//calculamos cuantos caracteres tiene la palabra, al terminar el numero de letras se termina el ciclo
            $letra = $mensaje[$i];
            $posicion = -1;  // Inicializamos la posición en -1 (no encontrada)
    
            // Buscamos la posición de la letra en el alfabeto mediante un ciclo
            for ($j = 0; $j < $longitudAlfabeto; $j++) {
                if ($alfabeto[$j] == $letra) {
                    $posicion = $j;
                    break;  // Salimos del ciclo cuando encontramos la letra
                }
            }
    
            if ($posicion !== -1) {
                $nueva_posicion = ($posicion - 5) % $longitudAlfabeto;
                $letra_desencriptada = $alfabeto[$nueva_posicion];
                $mensaje_desencriptado .= $letra_desencriptada;
            } else {
                $mensaje_desencriptado .= $letra;
            }
        }
    
        return $mensaje_desencriptado;
    }
    }

    if (isset($_POST["boton1"])) {
        $mensaje_encriptado = encriptarMensaje($texto);
    } elseif (isset($_POST["boton2"])) {
        $mensaje_desencriptado = descencriptarMensaje($texto);
    } else {
        echo "Ningún botón se ha presionado.";
        exit();
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Encriptación</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Resultado de Encriptación</h1>
        <?php
        if (isset($mensaje_encriptado)) {
            echo '<label for="texto">Mensaje encriptado: ' . $mensaje_encriptado . '</label>';
        } elseif (isset($mensaje_desencriptado)) {
            echo '<label for="texto">Mensaje desencriptado: ' . $mensaje_desencriptado . '</label>';
        }
        ?>
        <br>
        <br>
        <a href="index.html">Volver al formulario</a>
    </div>
</body>
</html>

