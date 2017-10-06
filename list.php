<?php
$fileList = glob("*.json");
$num = 1;

if (isset($_GET['text'])){
    $message = $_GET['text'];
    echo $message;
}
?>

<html>
    <body>
        <h2>СПИСОК ТЕСТОВ</h2><br>
        <form action="test.php"  method="GET">
            <p>Выберите тест</p>
            <?php foreach ($fileList as $file) {
                echo '<label><input type="radio" name="status" value="' .$num.'">'.$file.'</label>' .PHP_EOL;
                $num = $num + 1;
            }
            ?>
        <input type="submit" value="Пройти тест"><br>
        </form>
        <h2><a href="admin.php">Администратор</a></h2>
    </body>
</html>