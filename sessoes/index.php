<?php

session_start();
$_SESSION['nome'] = 'Gabriel';
//terminei de usar a sessão
session_write_close();
sleep(5);
