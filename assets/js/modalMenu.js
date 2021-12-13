// Modal Menu

const btn = document.querySelector('#btnMenu');
const menu = document.querySelector('#overlay');

btn.addEventListener('click', () => {
    menu.classList.toggle("hidden");
});