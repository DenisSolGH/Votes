<?php
    require "header.html";
    require_once 'database.php';
    require_once 'show_user_info.php';
    require_once 'show_vote_info.php';
?>

<?php

db_connect();
register_user();
?>

<!-- HTML-код не изменялся -->

<!-- Лабораторнаяработа №5 
Главная страница
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Голосование</title>
</head>
<body>

<!-- Header -->
    
    
    <!-- <div class="maincontent">
        <div class="image">
            <img class="titleimage" src="https://img.freepik.com/free-photo/hands-holding-smartphone-social-media-concept_23-2150208237.jpg?w=900&t=st=1691778640~exp=1691779240~hmac=6823c02b85cff0677c5446d7db5c08a7cd978b5f19ff912a4ba272842dce8665" width="" alt="">
            
        </div>

        <div class="description">
            <p class="titletext">
                Проводится онлайн голосование с целью выявить лучшие мессенджеры.  <br><br>
                Начало голосования: 1.09.2023. <br><br>
                Окончание голосования: 1.10.2023.
            </p>
        </div>
    </div> -->
<?php
$connection = db_connect(); 

if ($connection) {
    $sql = "SELECT * FROM contest";
    $result = mysqli_query($connection, $sql);

    // Проверка успешности запроса
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        echo '<h1>';
        echo $row['title'] . '<br><br>';
        echo '</h1>';
        echo '<div class="maincontent">';
        echo '<div class="image">';
        echo '<img class="titleimage" src="' . $row['contest_image'] . '" width="" alt="">';
        echo '</div>';
        echo '<div class="description">';
        echo '<p class="titletext">';
        echo $row['description'] . '<br><br>';
        echo 'Начало голосования: ' . $row['start'] . '. <br><br>';
        echo 'Окончание голосования: ' . $row['finish'] . '.';
        echo '</p>';
        echo '</div>';
        echo '</div>';
    } else {
        // Вывод сообщения об ошибке запроса
        echo "Ошибка запроса: " . mysqli_error($connection);
    }

    // Закрытие соединения
    mysqli_close($connection);
} else {
    // Вывод сообщения об ошибке соединения
    echo "Ошибка соединения с базой данных";
}
?>

    <?php
            show_user_info();
            show_vote_info();
    ?>
    </body>
</html>


<script src="menu.js"></script>

