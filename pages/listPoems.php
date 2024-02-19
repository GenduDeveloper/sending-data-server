<html>
<head>
    <meta charset="UTF-8">
    <title>Список стихотворений</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Список стихотворений</h1>
    <div class="link">
        <a href="../welcome.php">Вернуться на главную</a>
    </div><hr>

    <ul>
        <?php

        $filename = 'articles.txt';

        $poemsJson = file_get_contents($filename); // считали файл

        $poemsArray = json_decode($poemsJson, true); // преобразовали строку json в массив

        foreach ($poemsArray as $poem) {
            echo "<li><strong>Название стихотворения:</strong> {$poem['title_poem']}</li><br>";
            echo "<li><strong>Автор:</strong> {$poem['author_poem']}</li><br><hr>";
        }  // лучше было вывести одним echo?
        ?>
    </ul>

</body>
</html>


