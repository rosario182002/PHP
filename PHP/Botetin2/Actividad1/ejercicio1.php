<?php
session_start();

// Inicializar el juego
if (!isset($_SESSION['numero_a_adivinar'])) {
    $_SESSION['numero_a_adivinar'] = rand(1, 50);
    $_SESSION['intentos'] = 6;
    $_SESSION['mensaje'] = "Adivina el número entre 1 y 50. Tienes 6 intentos.";
}

// Procesar intento del jugador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adivinanza = (int)$_POST['adivinanza'];
    $_SESSION['intentos']--;

    // Verificar el intento
    if ($adivinanza === $_SESSION['numero_a_adivinar']) {
        $_SESSION['mensaje'] = "¡Correcto! Has adivinado el número.";
        session_unset(); // Reiniciar el juego
    } elseif ($_SESSION['intentos'] <= 0) {
        $_SESSION['mensaje'] = "Has perdido. El número era {$_SESSION['numero_a_adivinar']}.";
        session_unset(); // Reiniciar el juego
    } else {
        $_SESSION['mensaje'] = $adivinanza < $_SESSION['numero_a_adivinar'] 
            ? "El número es mayor. Te quedan {$_SESSION['intentos']} intentos." 
            : "El número es menor. Te quedan {$_SESSION['intentos']} intentos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Adivinanza</title>
</head>
<body>
    <h1>Juego de Adivinanza</h1>
    <p><?php echo $_SESSION['mensaje']; ?></p>

    <?php if (isset($_SESSION['numero_a_adivinar']) && $_SESSION['intentos'] > 0): ?>
        <form method="post" action="">
            <label for="adivinanza">Creo que es el número:</label>
            <input type="number" id="adivinanza" name="adivinanza" min="1" max="50" required>
            <button type="submit">Intentar</button>
        </form>
    <?php else: ?>
        <form method="post" action="">
            <button type="submit">Jugar de nuevo</button>
        </form>
    <?php endif; ?>
</body>
</html>
