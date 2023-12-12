<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = db_connect();

    echo 'Я тут 1';
    if ($connection !== false) {
        echo 'Я тут 2';
        $candidate_id = $_POST['candidate_id'];
        $name = $_POST['editName'];
        $description = $_POST['editDescription'];

        // Выполнение операции обновления в базе данных
        $query = "UPDATE candidate SET name = '$name', long_description = '$description' WHERE candidate_id = '$candidate_id'";
        $result = mysqli_query($connection, $query);

        // Отправка JSON-ответа
        header('Content-Type: application/json');

        if ($result) {
            echo 'Я тут 3';
            echo json_encode(['success' => true, 'message' => 'Изменения сохранены успешно.']);
        } else {
            echo 'Я тут 33';
            echo json_encode(['success' => false, 'error' => 'Ошибка при сохранении изменений: ' . mysqli_error($connection)]);
        }

        mysqli_close($connection);
    }
}
?>
