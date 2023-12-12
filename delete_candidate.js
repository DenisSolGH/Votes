
function openModalDel() {
    var deleteModal = document.getElementById('deleteModal');
    var selectElement = document.getElementById('objectToDelete');

    // Очищаем предыдущие опции
    selectElement.innerHTML = '';

    // Делаем AJAX-запрос для получения списка объектов из базы данных
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_objects.php', true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            // Преобразуем полученные данные в массив строк (имен объектов)
            var objects = JSON.parse(xhr.responseText);

            // Добавляем опции в выпадающий список
            for (var i = 0; i < objects.length; i++) {
                var option = document.createElement('option');
                option.value = objects[i];
                option.text = objects[i];
                selectElement.add(option);
            }

            // Показываем модальное окно
            deleteModal.style.display = 'block';
        }
    };

    xhr.send();
}


function closeDeleteModal() {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.style.display = 'none';
}

function deleteObject() {
    var selectElement = document.getElementById('objectToDelete');
    var objectName = selectElement.value;

    // Отправка запроса на сервер для удаления объекта
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_candidate.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Обработка ответа от сервера (можно заменить на другие действия)
            console.log(xhr.responseText);
            // Закрытие модального окна после успешного удаления
            closeDeleteModal();

            // Перезагрузка страницы или обновление списка объектов
            // в зависимости от вашего интерфейса
            location.reload(); // или другой код обновления списка
        }
    };
    var data = "objectName=" + objectName;
    xhr.send(data);
}
