<?php

$start = microtime(true);

sleep(3);

$end = microtime(true);

echo 'O tempo que demorou para o meu script ser executado foi: ' . ($start - $end);
