<?php

function db_content($connection) {
    // Если подключение не удалось, не продолжаем
    if ($connection === null) {
        return;
    }

    echo '

    <h1 style="margin-top: 7rem; text-align: center; font-size: 2.5rem;">Мессенджеры</h1>';

    
    

    echo '<div style="display: flex; flex-wrap: wrap; justify-content: flex-start; align-items: center; margin-top: 20px;">'; // начало контейнера Flex
    $query = 'SELECT * FROM candidate;';
    $result = mysqli_query($connection, $query);

    // Вывод данных
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div style="flex: 0 0 calc(33.33% - 10px); margin: 5px; box-sizing: border-box; cursor: pointer;" onclick="openCandidatePage(' . $row['candidate_id'] . ')">';
        echo '<h3 style="text-align: center; font-size: 2em; cursor: pointer;" onclick="openCandidatePage(' . $row['candidate_id'] . ')">' . $row['name'] . '</h3>';
        echo '<p style="font-size: 1.2em;">' . $row['short_description'] . ' <img style="width: 80%; height: 300px; object-fit: contain; margin: 0 auto; display: block;" src="' . $row['candidate_image'] . '" alt="Мессенджер"></p>';

        // Добавление кнопки "Проголосовать"
        echo '<div style="text-align: center;">';
        echo '<button class="vote-button" onclick="event.stopPropagation(); voteForCandidate(' . $row['candidate_id'] . ')">Проголосовать</button>';
        echo '</div>';

        echo '</div>';
    }

    echo '</div>'; // конец контейнера Flex
}

?>
