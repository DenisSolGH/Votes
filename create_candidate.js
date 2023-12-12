function openModalAdd() {
    // Открывает модальное окно
    var modal = document.getElementById('myModal');
    modal.style.display = 'block';
}

function closeModalAdd() {
    // Закрывает модальное окно
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
    console.log('Закрыть');
}

function saveObjectAdd() {
    // Получение данных из полей формы
    var objectName = document.getElementById('objectName').value;
    var shortDescription = document.getElementById('shortDescription').value;
    var longDescription = document.getElementById('longDescription').value;

    // Отправка данных на сервер
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "create_candidate.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Закрытие модального окна
            console.log('Привет 1');

            console.log(xhr.responseText);
            
            closeModalAdd();
            console.log('Привет 2');

            location.reload(); 
            console.log('Привет3');

        }
    };

    var data = "objectName=" + objectName + "&shortDescription=" + shortDescription + "&longDescription=" + longDescription;
    xhr.send(data);
}
