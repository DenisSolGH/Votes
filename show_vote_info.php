<?php
    
function show_vote_info() {
    $connection = db_connect();

    if ($connection !== false) {
        $query = "SELECT users.first_name as user_first_name, users.last_name as user_last_name, candidate.name as candidate_name
                  FROM vote
                  JOIN users ON vote.user_id = users.user_id
                  JOIN candidate ON vote.candidate_id = candidate.candidate_id";

        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<table style='border-collapse: collapse; width: 100%;'>";
            echo "<caption style='font-weight: bold; font-size: 30px;'>Информация о голосах</caption>";
            echo "<tr><th style='border: 1px solid black; padding: 8px;'>Имя пользователя</th><th style='border: 1px solid black; padding: 8px;'>Фамилия пользователя</th><th style='border: 1px solid black; padding: 8px;'>Имя кандидата</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['user_first_name']) . "</td>";
                echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['user_last_name']) . "</td>";
                echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['candidate_name']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
        }

        mysqli_close($connection);
    }
}

?>
