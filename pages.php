<?php
    require "header.html";
    require_once 'database.php';
    require_once 'candidates.php';
?>

<?php

    $connection = db_connect();
    db_content($connection);
    // Регистрация пользователя
    register_user($connection);

    // Закрытие соединения
    mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Голосование</title>
</head>
<body>
<!-- header -->


 <!-- Стили для модального окна -->
    <style>
        #myModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>

    <style>
        #deleteModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        #deleteModal .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px; /* Выберите желаемую ширину модального окна */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        #deleteModal .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        #deleteModal button {
            margin-top: 15px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #deleteModal button:hover {
            background-color: #ddd; /* Цвет при наведении */
        }
    </style>

    <div>
        <button style="    
            padding: 10px 20px;
            border-radius: 4px;
            background-color: blue;
            color: white;
        " class="edit-button" onclick="openModalAdd()">Добавить объект</button>
        
        <button style="    
            padding: 10px 20px;
            border-radius: 4px;
            background-color: blue;
            color: white;
        " class="edit-button" onclick="openModalDel('Название объекта')">Удалить объект</button>

    </div>

    <!-- Модальное окно -->
    <div id="myModal">
        <div class="modal-content">
            <span class="close" onclick="closeModalAdd()">&times;</span>
            <!-- Форма для добавления объекта -->
            <form id="addObjectForm">
                <!-- Поле для имени -->
                <label for="objectName">Имя объекта:</label>
                <input type="text" id="objectName" name="objectName" required>
        
                <!-- Поле для короткого описания -->
                <label for="shortDescription">Короткое описание:</label>
                <textarea id="shortDescription" name="shortDescription" required></textarea>
        
                <!-- Поле для длинного описания -->
                <label for="longDescription">Длинное описание:</label>
                <textarea id="longDescription" name="longDescription" required></textarea>
        
                <!-- Кнопка для сохранения объекта -->
                <button type="button" onclick="saveObjectAdd()">Сохранить объект</button>
            </form>
        </div>
    </div>

    <!-- Модальное окно для подтверждения удаления -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDeleteModal()">&times;</span>
            <p>Выберите объект для удаления:</p>
            <select id="objectToDelete">
                <!-- Опции будут добавлены динамически с помощью JavaScript -->
            </select>
            <button onclick="deleteObject()">Да</button>
            <button onclick="closeDeleteModal()">Отмена</button>
        </div>
    </div>


</body>

</html>


<script src="menu.js"></script>
<!-- <a href="pageofobject.php?candidate_id=">sadsadsada</a> -->
<script>
    function openCandidatePage(candidateId) {
        console.log('Пытаюсь открыть страницу для кандидата с ID:', candidateId);
        // Перенаправление на страницу с информацией о конкретном объекте
        window.location.href = 'pageofobject.php?candidate_id=' + candidateId;
    }
</script>
<script src="create_candidate.js"></script>
<script src="delete_candidate.js"></script>