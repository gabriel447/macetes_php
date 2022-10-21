<?php

session_start();

$pdo = new PDO("mysql:host=localhost;dbname=devweb", 'root', '');

if (isset($_POST['login']) && !isset($_SESSION['login'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['token'] = uniqid();
    $sql = $pdo->prepare("DELETE FROM login WHERE login = ?");
    $sql->execute(array($_SESSION['login']));
    $sql = $pdo->prepare("INSERT INTO login VALUES (null, ?, ?)");
    $sql->execute(array($_SESSION['login'], $_SESSION['token']));
}


if (!isset($_SESSION['login'])) {
    echo '<h2>Realize o Login:</h2>';
    echo '<form method="post"><input type="text" name="login"><input type="submit"></form>';
} else {
    // verificar se não existia outra sessão em progresso!
    $login = $_SESSION['login'];
    $token = $_SESSION['token'];
    $check = $pdo->prepare("SELECT `id` FROM login WHERE login = ? AND token = ?");
    $check->execute(array($login, $token));

    if ($check->rowCount() == 1) {
        echo 'Olá' . $_SESSION['login'];
    } else {
        echo 'Ops, você vai ser deslogado pois encontramos outro usuario logado na sua conta...';
        session_destroy();
    }
}
