<?php

// подключение страниц с помощью гет

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} // проверка наличия get параметра


switch ($page) {
    case 'add_poem':
        include __DIR__ . '/addPoem.php'; // страница для добавления стихотворений
        break;
    case 'list_poems':
        include __DIR__ . '/listPoems.php'; // страница со списком стихотворений
        break;
    case 'list_number_poems':
        include __DIR__ . '/listNumberPoems.php'; // страница с выводом стихотворения по его номеру
        break;
    default:
        echo 'Такой страницы не существует';
}




