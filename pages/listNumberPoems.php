<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вывод стихотворения по номеру</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Вывод стихотворения по его номеру из файла</h1>
    <div class="link">
        <a href="../welcome.php">Вернуться на главную</a>
    </div><hr>

    <!--Форма для вывода стихотворения по номеру методом POST -->

    <form action="listNumberPoems.php" method="post">
        <label for="list_number_poem">Номер стихотворения:</label><br>
        <input type="text" name="list_number_poem" placeholder="введите номер для вывода"><br><br>

        <input type="submit" value="Вывести">
    </form><hr>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // проверяем, что отправка через POST
    $listNumberPoem = $_POST['list_number_poem'];

    $filename = 'articles.txt';

    file_get_contents($filename); // читаем содержимое файла в строку

    if (file_exists($filename)) { // проверяем, что articles.txt существует
        $listNumberPoemString = json_decode(file_get_contents($filename), true); // декодируем обратно в массив
    }

if (isset($listNumberPoemString[$listNumberPoem - 1])) { // Так как в массиве запись с нуля, то можно сделать - 1 для удобства. Если запись будет, isset вернет true и пойдет выполнение
    $selectedPoem = $listNumberPoemString[$listNumberPoem - 1];

    echo "<strong>Название: </strong> {$selectedPoem['title_poem']}<br><strong>Автор:</strong> {$selectedPoem['author_poem']}<br><strong>Текст:</strong> {$selectedPoem['text_poem']}"; // хз лучше так или нет, сделал echo в одну строку
} else {
    echo "Стихотворение с указанным номер не найдено. Попробуйте еще раз.";
}

}

?>

</body>
</html>