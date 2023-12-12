<?php
    require "header.html";
    require_once 'database.php';
    require_once 'objectdetails.php';
?>





<!-- Лабораторнаяработа №6
Страница объекта
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">

<title>Голосование</title>

</head>
<!--  Header -->
</div>
    <button style="    
        padding: 10px 20px;
        border-radius: 4px;
        background-color: blue;
        color: white;
    
    "class="edit-button" onclick="openModal()">Редактировать</button>
</div>
<!-- Модальное окно -->
<div id="myModal" class="modal">
    <!-- Содержимое модального окна -->
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <!-- Форма для редактирования данных -->
        <form id="editForm" style="
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 8px;
            overflow: hidden;
        " autocomplete="off"> 
            <!-- Поля для редактирования данных -->
            <label for="editName" style="font-weight: bold; display: block; margin-bottom: 10px;">Имя:</label>
            <input type="text" id="editName" name="editName" style="
                width: calc(100% - 20px); 
                padding: 10px;
                margin-bottom: 20px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
            ">

            <label  for="editDescription" style="font-weight: bold; display: block; margin-bottom: 10px;">Описание:</label>
            <textarea id="editDescription" name="editDescription" style="
                width: calc(100% - 20px); 
                padding: 10px;
                margin-bottom: 20px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
            "></textarea>

        <?php
            if (isset($_GET["candidate_id"])) {
        ?>
                <input  type="text" value="<?= $_GET["candidate_id"]; ?>"  id="candidate_id" name="candidate_id" style="
                display: none;
                ">
        <?php
            }
        ?>
            <!-- Кнопка "Сохранить изменения" -->
            <button type="button" onclick="saveChanges()" style="
                background-color: #4caf50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: right; 
            ">Сохранить изменения</button>
        </form>

    </div>
</div>

</html>



<script src="menu.js"></script>
<script src="update_candidate.js"></script>
