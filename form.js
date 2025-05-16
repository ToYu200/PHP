// Отправка формы через AJAX на https://httpbin.org/post
const form = document.getElementById('feedbackForm');
if (form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        fetch('https://httpbin.org/post', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert('Форма успешно отправлена!\nОтвет сервера: ' + JSON.stringify(data, null, 2));
            form.reset();
        })
        .catch(() => alert('Ошибка отправки формы.'));
    });
}
