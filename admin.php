<?php

if ((isset($_FILES['fileTest']['name'])) && (!empty ($_FILES['fileTest']['name'])))
{
    $fileDes = 'tests/' . $_FILES['fileTest']['name'];

    if (!isset($_POST ['fio'])) {
        echo "Вы не ввели свое имя!";
        exit;
    }

    if (isset($_FILES['fileTest']['name'])) {

        $opt1 = PATHINFO_EXTENSION;
        $opt2 = PATHINFO_FILENAME;
        $ext = pathinfo($_FILES['fileTest']['name'], $opt1);
        $name = pathinfo($_FILES['fileTest']['name'], $opt2);
        $str = '/^(?:[a-z0-9_-]|\.(?!\.))+$/iD';

        if (((!ctype_alnum($name)) || (!preg_match($str, $name))) || ($ext != 'json')) {
            exit("Неверное имя или расширение файла!");
        }
        else {
            if (move_uploaded_file($_FILES['fileTest']['tmp_name'], $fileDes)) {

                echo $_POST['fio'] . ", файл загружен";
            }
            else {
                echo $_POST['fio'] . ", файл не загружен";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Загрузка файлов на сервер</title>
</head>
<body>
    <h2>Загрузка тестов</h2>
    <form enctype="multipart/form-data" method="post">
        <p>Введите ваше имя:</p>
        <p><input name="fio" type="TEXT" placeholder="Введите имя"></p>
        <p>Выберите файлы с расширением *.json</p>
        <p><input type="file" name="fileTest"></p>
        <p><input type="submit" value="Загрузка файла"></p>
    </form>
    <a href="list.php">Выбор тестов</a>
</body>
</html>