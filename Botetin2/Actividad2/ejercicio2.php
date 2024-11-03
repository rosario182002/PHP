<?php
// Definición de la variable $var con varios tipos de datos
$valores = [null,true,false,0,1,-1,0.0,1.5,"0","1","Hola","10.5",[],[1, 2, 3],];

// Función para realizar las conversiones
function mostrarConversiones($valor) {
    // Convertir a int
    $intValue = (int)$valor;

    // Convertir a boolean
    $boolValue = (bool)$valor;

    // Convertir a string
    $stringValue = (string)$valor;

    // Convertir a float
    $floatValue = (float)$valor;

    // Imprimir los resultados
    echo "Valor original: " . var_export($valor, true) . "\n";
    echo "Int: " . $intValue . "\n";
    echo "Boolean: " . ($boolValue ? 'true' : 'false') . "\n";
    echo "String: '" . $stringValue . "'\n";
    echo "Float: " . $floatValue . "\n";
    echo "--------------------------\n";
}

// Recorrer la lista de valores y mostrar las conversiones
foreach ($valores as $valor) {
    mostrarConversiones($valor);
}
?>