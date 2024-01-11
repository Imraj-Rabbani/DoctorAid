/*!
* Start Bootstrap - Heroic Features v5.0.6 (https://startbootstrap.com/template/heroic-features)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-heroic-features/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project



const selectElement = document.getElementById('redirect-specialty');
if (selectElement) {
    selectElement.addEventListener('change', function() {
        const selectedOptionValue = this.value;
        if (selectedOptionValue) {
            window.location.href = selectedOptionValue;
        }
    });
}


const toggleIcon = document.getElementById('toggle_icon');
const selectMenu = document.getElementById('menu-bar');
const selectNav = document.getElementById('nav-container');

if(selectMenu && selectNav){

    toggleIcon.addEventListener('click', function () {
        selectMenu.classList.toggle('menus');
        selectMenu.classList.toggle('without-menu');
        selectNav.classList.toggle('change')
    })
}