<?php
$massAnswer = [];
$massTrueAnswer = [];
if ((isset($_GET['question1'])) && (isset($_GET['question2'])) &&
    (isset($_GET['question3'])) && (isset($_GET['question4'])) &&
    (isset($_GET['question5']))) {
    $massAnswer[] = $_GET['question1'];
    $massAnswer[] = $_GET['question2'];
    $massAnswer[] = $_GET['question3'];
    $massAnswer[] = $_GET['question4'];
    $massAnswer[] = $_GET['question5'];
}
else {
    header("Location: list.php?text=\"Вы ответили не на все вопросы. Попробуйте еще раз\"");
}

if (isset($_GET['nameFileTest']))
{
   $fileNameTest = $_GET['nameFileTest'];
   $dataJSON = json_decode(file_get_contents($fileNameTest),true);

   foreach ($dataJSON as $item)
   {
       $massTrueAnswer[] = $item['true_answer'];
   }
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