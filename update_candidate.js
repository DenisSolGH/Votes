function openModal() {
    document.getElementById('myModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}

function saveChanges() {
    // Получение данных из формы
    var formData = new FormData(document.getElementById("editForm"));

    // Отправка данных на сервер
    fetch("update_candidate.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Обработка ответа от сервера
        console.log(data); // Вывод ответа в консоль
        // Обновление страницы
        location.reload();
    })
    .catch(error => {
        console.error("Ошибка при сохранении изменений:", error);
    });
}