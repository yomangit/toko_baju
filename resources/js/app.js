import './bootstrap';
import "toastify-js/src/toastify.css";
import Toastify from 'toastify-js'
window.Toastify = Toastify;


const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const tema = document.querySelector('.theme_control');
const menu_open = document.getElementById("menu_open")
const avatar = document.getElementById("avatar")
const text_avatar = document.getElementById("text_avatar")
const click = document.getElementById("click")
menu_open.addEventListener("click", function () {
    if (document.getElementById('menu_open').checked) {
        sidebar.classList.add('sidebar_small');
        tema.classList.add('hidden');
        avatar.classList.add('avatar_small');
        text_avatar.classList.add('avatar_small');

        mainContent.classList.add('main-content_large');
        mainContent.classList.remove('lg:ml-[18%]');
        // mainContent.classList.remove('ml-[40%]');
    } else {
        sidebar.classList.remove('sidebar_small');
        tema.classList.remove('hidden');
        avatar.classList.remove('avatar_small');
        text_avatar.classList.remove('avatar_small');
        mainContent.classList.remove('main-content_large');
        mainContent.classList.add('lg:ml-[18%]');
        // mainContent.classList.add('ml-[40%]');
    }
});

