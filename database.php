<?php

function db_connect() {
    $config = parse_ini_file('../../hw_config.ini');
    $connection = mysqli_connect(
        $config['host'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );

    if ($connection == false) {
        echo 'При попытке подключения к БД возникла ошибка, обратитесь к администратору.';
        return false;
    }

    return $connection;
}

function register_user() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $connection = db_connect();

        if ($connection !== false) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];
            $phone_number = $_POST['phone_number'];

            $checkUser = mysqli_query($connection, "SELECT * FROM users WHERE `first_name` = '$first_name' AND `last_name` = '$last_name' AND `age` = '$age' AND `phone_number` = '$phone_number'");
            $isUserExists = mysqli_num_rows($checkUser);

            if ($isUserExists == 0) {
                mysqli_query($connection, "INSERT INTO users (`first_name`, `last_name`, `age`, `phone_number`) VALUES ('$first_name', '$last_name', '$age', '$phone_number')");
                $id = mysqli_insert_id($connection);
                echo "Пользователь успешно зарегистрирован. ID пользователя: $id";
            } else {
                echo "Пользователь с такими данными уже существует";
            }

            mysqli_close($connection);
        }
    }
}



?>
