<!-- evitando erros de redirect -->

<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <p>Olá mundo</p>
    <?php
    header('Location: https://www.google.com');
    die();
    ?>
</body>

</html>

<?php
ob_end_flush();
// ou voce pode usar javascript para não precisar usar a funcao nativa do php, porem deve usar o die depois
// echo '<script>Location.href="http://google.com"</script>';
// die();
?>