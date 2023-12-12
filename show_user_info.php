<?php
    
    function show_user_info() {
        $connection = db_connect();
    
        if ($connection !== false) {
            // SQL-запрос для получения информации о пользователях
            $query = "SELECT first_name, last_name, age, phone_number FROM users";
            $result = mysqli_query($connection, $query);
    
            if ($result) {
                // Вывод таблицы с информацией о пользователях
                echo "<table style='border-collapse: collapse; width: 100%;'>";
                echo "<caption style='font-weight: bold; font-size: 30px;'>Зарегистрированные пользователи</caption>";
                echo "<tr><th style='border: 1px solid black; padding: 8px;'>Имя</th><th style='border: 1px solid black; padding: 8px;'>Фамилия</th><th style='border: 1px solid black; padding: 8px;'>Возраст</th><th style='border: 1px solid black; padding: 8px;'>Номер телефона</th></tr>";
    
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['first_name']) . "</td>";
                    echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['last_name']) . "</td>";
                    echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['age'] . "</td>";
                    echo "<td style='border: 1px solid black; padding: 8px;'>" . htmlspecialchars($row['phone_number']) . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

                
                // SQL-запрос для подсчета количества пользователей
                $count_query = "SELECT COUNT(*) AS user_count FROM users";
                $count_result = mysqli_query($connection, $count_query);

                if ($count_result) {
                    $count_row = mysqli_fetch_assoc($count_result);
                    $num_users = $count_row['user_count'];
                    
                    // Вывод количества пользователей
                    echo "<p style='font-weight: bold;'>Всего пользователей: " . $num_users . "</p>";
                } else {
                    echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
                }
            } else {
                echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
            }
    
            mysqli_close($connection);
        }
    }
    
?>



