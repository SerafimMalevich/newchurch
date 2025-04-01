const burgerMenu = document.getElementById('burgerMenu');
const menuBurger = document.getElementById('menuBurger');

burgerMenu.addEventListener('click', () => {
    burgerMenu.classList.toggle('active');
    menuBurger.classList.toggle('active');
});


const modal = document.getElementById('myModal');
const modalImg = document.getElementById('img01');
const closeBtn = document.getElementsByClassName('close')[0];

// Находим все изображения с классом gallery-image
const images = document.querySelectorAll('.gallery-image');

// Добавляем обработчик клика для каждой картинки
images.forEach(img => {
    img.onclick = function () {
        modal.style.display = 'block'; // Показываем модальное окно
        modalImg.src = this.src; // Копируем адрес картинки в модальное окно
    };
});

// Закрываем модальное окно при клике на крестик
closeBtn.onclick = function () {
    modal.style.display = 'none'; // Скрываем модальное окно
};

// Закрываем модальное окно при клике вне картинки
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = 'none'; // Скрываем модальное окно
    }
};


