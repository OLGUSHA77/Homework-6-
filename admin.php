<?php

if ((isset($_FILES['fileTest']['name'])) && (!empty ($_FILES['fileTest']['name'])))
{
    $fileDes = '/tests/' . $_FILES['fileTest']['name'];
    //var_dump($fileDes);
    if (move_uploaded_file($_FILES['fileTest']['tmp_name'], $fileDes)) {
        echo "Файл загружен";
    }
    else {
        echo "Файл не загружен";
    }

    if (isset($_FILES['fileTest']['name'])) {
        $ext = pathinfo($_FILES['fileTest']['name'], PATHINFO_EXTENSION);
        var_dump($ext);
        if ($ext != 'json') {
            echo "Неверное расширение файла!";
            exit;
        }
    }
}

if (isset($_POST['fio'])) {
    var_dump($_POST['fio']);
}

?>

<form enctype="multipart/form-data" action="/" method="POST">
    <input name="fio" type="TEXT" placeholder="Введите имя"><br>
    <input type="file" name="fileTest"><br>
    <input type="submit" value="Загрузка файла"><br>
    <br>
    <a href="list.php">Выбор тестов</a>
</form>
