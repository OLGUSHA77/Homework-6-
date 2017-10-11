<form action="results.php" method="GET">

    <?php
    $dir = 'tests';
    $fileList = scandir($dir);
    array_shift($fileList); // удаляем из массива '.'
    array_shift($fileList); // удаляем из массива '..'

    if (isset($_GET['status']))
    {
        $n = (int)$_GET['status'];
        $n = $n - 1;
        $curFileTest = $fileList[$n];
        $fulPathFileTest = 'tests/' . $curFileTest;

        if (!file_exists($fulPathFileTest)) {
            echo "Файл с именем " . $curFileTest . "не существует!";
        }
    }

    echo 'Имя файла:<input type="TEXT" name="nameFileTest" value="' . $curFileTest . '"><br>';

    $file = file_get_contents($curFileTest);
    $dataJSON = json_decode($file,true);
    $num = 1;
    foreach ($dataJSON as $item)
    {
        echo "ВОПРОС #" . $item['number'] . ' ' . $item['Question'] . '<br>';
        foreach ($item['answers'] as $answer)
        echo '<label><input type="radio" value="' . $answer . '" name="question' . $num . '">'. $answer . '</label><br>';
        $num = $num + 1;
    }
?>
    <br><input type="submit" value="Готово">
</form>




