<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // проверяем, что метод отправки POST
    if (!empty($_POST['title_poem']) && !empty($_POST['author_poem']) && !empty($_POST['text_poem'])) { // проверяем, что значения заполнены и не равны нулю
        $dataPoem = [
                'title_poem' => $_POST['title_poem'],
                'author_poem' => $_POST['author_poem'],
                'text_poem' => $_POST['text_poem']
        ]; // сохраняем в массив


        $dataPoemString = []; // считываем как строку
        $filename = 'articles.txt';

        if (file_exists($filename)) {
            $dataPoemString = json_decode(file_get_contents($filename), true); // декодируем обратно в массив
        }


        $dataPoemString[] = $dataPoem; // добавляем новую статью в массив

        file_put_contents($filename, json_encode($dataPoemString, JSON_UNESCAPED_UNICODE)); // кодируем и записываем в файл

    } else {
        echo "Не все поля были заполнены";
    }
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Добавление стихотворения</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Добавление стихотворений</h1>
    <div class="link">
        <a href="../welcome.php">Вернуться на главную</a>
    </div><hr>

            <!--Форма для добавления стихотворений методом POST -->

        <form action="addPoem.php" method="post">
            <label for="title_poem">Название стихотворения:</label><br>
            <input type="text" name="title_poem" placeholder="введите название"><br><br>

            <label for="author_poem">Автор стихотворения:</label><br>
            <input type="text" name="author_poem" placeholder="введите автора"><br><br>

            <label for="text_poem">Текст стихотворения:</label><br>
            <textarea name="text_poem" cols="50" rows="4" placeholder="введите текст"></textarea><br><br>

            <input type="submit" value="Добавить стихотворение">
        </form>
</body>
</html>
