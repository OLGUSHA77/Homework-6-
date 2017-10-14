<?php
$dir = 'tests';
if (is_dir($dir))
{
    $fileList = scandir($dir);
    array_shift($fileList); // удаляем из массива '.'
    array_shift($fileList); // удаляем из массива '..'
}

$num = 1;

if (isset($_GET['text']) && $_GET['text']==true) {
    echo "Вы ответили не на все вопросы. Попробуйте еще раз!";
}?>

<html>
    <body>
        <h2>Список тестов</h2>
        <p>Выберите тест</p>
        <form action="test.php"  method="GET">
            <ol>
            <?php foreach ($fileList as $file) {
                echo '<li><input type="radio" name="status" value="' .$num.'">'.$file.'</li>';
                $num = $num + 1;
            }?>
            </ol>
        <input type="submit" value="Пройти тест"><br>
        </form>
        <a href="admin.php">Загрузка тестов</a>
    </body>
</html>