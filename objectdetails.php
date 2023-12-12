<?php
    require_once 'database.php';
?>

<?php
    

    function get_object_details($object_id) {
        // Получение соединения
        $connection = db_connect();

        if ($connection !== false) {
            // Используйте параметризованный запрос для предотвращения SQL-инъекций
            $query = 'SELECT * FROM candidate WHERE candidate_id = ?';
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, 'i', $object_id);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            // Вывод подробной информации
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                display_object_details($row);
            } else {
                die('Ошибка выполнения запроса: ' . mysqli_error($connection));
            }

            // Закрыть соединение
            mysqli_close($connection);
        }
    }

    function display_object_details($row) {
        // Вывод подробной информации о кандидате
        echo '<div style="margin-top: 100px; display: flex; flex-direction: column; align-items: center; text-align: center; padding: 0 50px;">'; // Добавил отступы по бокам

        // Первый блок с Name
        echo '<div>';
        echo '<h1>' . $row['name'] . '</h1>';
        echo '</div>';

        // Второй блок с изображением и описанием
        echo '<div style="display: flex; align-items: center; justify-content: center; padding: 20px 0;">'; // Добавил отступы по бокам
        // Изображение
        echo '<div style="flex: 0 0 40%;">';
        echo '<img style="width: 100%;" src="' . $row['candidate_image'] . '" alt="Изображение кандидата">';
        echo '</div>';

        // Описание
        echo '<div style="padding-left: 20px;">';
        echo '<p>' . $row['long_description'] . '</p>';
        // Другие поля
        // Можете добавить стили для форматирования вывода
        echo '</div>';
        echo '</div>';

        // Закрываем общий контейнер
    }

    // Получение параметра запроса
    $object_id = isset($_GET['candidate_id']) ? $_GET['candidate_id'] : null;
    
    if ($object_id !== null) {
        // Получение и отображение подробной информации
        get_object_details($object_id);
    } else {
        echo "Не указан идентификатор объекта.";
    }

?>
