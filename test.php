<!DOCTYPE html>
<html>
<body>
<form action="results.php" method="GET">
    <?php

    $fileList = glob("*.json");
    if (isset($_GET['status']))
    {
        $n = (int)$_GET['status'];
        $n = $n - 1;
        $curFileTest = $fileList[$n];

        if (!file_exists($curFileTest)) {
            echo "Файл с именем" . $curFileTest . "не существует!";
        }
    }
    $num = 1;
    ?>
    Имя файла: <input type="TEXT" name="nameFileTest" value="<?=$curFileTest?>"><br>
    <?php

    $data = json_decode(file_get_contents($curFileTest),true);
    foreach ($data as $ket=>$value) {
        echo 'ВОПРОС #' . $value['number'] . ' ' . $value['Question'] . '<br>';
        foreach ($value['answers'] as $item)
        echo '<label><input type="radio" value="' . $item . '" name="question' . $num . '">'. $item . '</label><br>';
        $num = $num + 1;
    }
    ?>
    <br><input type="submit" value="Готово">
</form>
</body>
</html>



