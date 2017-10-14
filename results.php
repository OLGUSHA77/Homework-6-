<?php
$massAnswer = [];
$massTrueAnswer = [];
if (isset($_GET))
{
    foreach ($_GET as $key=>$item)
    {
        if (strrpos($key, "question") !== false){
            $massAnswer[] = $item;
        }
    }
}
else {
    header("Location: list.php?text=\"Вы ответили не на все вопросы. Попробуйте еще раз\"");
}
//echo "<pre>";
//var_dump($massAnswer);

if (isset($_GET['nameFileTest']))
{
    $fileNameTest = $_GET['nameFileTest'];
    $dataJSON = json_decode(file_get_contents('tests/' . $fileNameTest),true);

    foreach ($dataJSON as $item)
    {
        $massTrueAnswer[] = $item['true_answer'];
    }
}
else {
    http_response_code(404);
    echo "Cтраница не найдена!";
    exit(1);
}

$result = array_diff_assoc($massTrueAnswer,$massAnswer);
$falseAnswer = 5 - count($result);

if ($result == null){
    $messageResult = "Все верно. Вы правильно прошли тест! Поздравляем!";
}
else{
    $messageResult = "К сожалению, Вы не прошли тест. Попробуйте снова, нажав на Выбор тестов.";
}

?>

<h2>ВАШИ РЕЗУЛЬТАТЫ</h2>
<p><strong><?=$messageResult?></strong></p>
<p>Верно <?=$falseAnswer?> ответов из 5</p>
<p><a href="admin.php">Загрузка тестов</a></p>
<p><a href="list.php">Выбор тестов</a></p>