const burgerMenu = document.getElementById('burgerMenu');
const menuBurger = document.getElementById('menuBurger');

burgerMenu.addEventListener('click', () => {
    burgerMenu.classList.toggle('active');
    menuBurger.classList.toggle('active');
});