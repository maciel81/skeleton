import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

// jQuery
import jQuery from 'jquery';
window.$ = jQuery;

// Selectize
import '@selectize/selectize/dist/js/standalone/selectize';

$(document).ready(function () {
    // initialize Selectize
    $(".selectize").selectize();

    // Sidebar
    const body = document.querySelector("body"),
        navBrand = body.querySelector("#nav-brand"),
        sidebar = body.querySelector("#sidebar"),
        toggle = body.querySelector(".toggle"),
        modeSwitch = body.querySelector(".mode"),
        toggleSwitch = body.querySelector("#switch"),
        modeText = body.querySelector(".mode-text"),
        moonSun = body.querySelector(".moon-sun"),
        dropdown = body.querySelector(".dropend > ul");

    function setCookie(name, value) {
        const d = new Date();
        // d.setTime(d.getTime() + (365*24*60*60*1000));
        d.setFullYear(d.getFullYear()+100);
        const expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");

        if(sidebar.classList.contains("close")) {
            setCookie('sidebar', 'close');
        } else {
            setCookie('sidebar', 'open');
        }
        moonSun.classList.toggle('invisible');

    });

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");
        toggleSwitch.classList.toggle('bx-toggle-left');
        toggleSwitch.classList.toggle('bx-toggle-right');

        if(body.classList.contains("dark")) {
            modeText.innerText = "Light";
            dropdown.classList.add('dropdown-menu-dark');
            const newUrl = navBrand.getAttribute('src').replace('negative', 'color');
            navBrand.src = newUrl;
            setCookie('theme', 'dark');
        } else {
            modeText.innerText = "Dark";
            dropdown.classList.remove('dropdown-menu-dark');
            const newUrl = navBrand.getAttribute('src').replace('color', 'negative');
            navBrand.src = newUrl;
            setCookie('theme', 'light');
        }
    });



    // // toggle Password
    // const togglePassword = document.querySelector("#togglePassword");
    // const password = document.querySelector("#password");
    // togglePassword.addEventListener("click", function () {
    //     // toggle the type attribute
    //     const type = password.getAttribute("type") === "password" ? "text" : "password";
    //     password.setAttribute("type", type);
    //     // toggle the eye icon
    //     this.classList.toggle('bx-lock-open');
    //     this.classList.toggle('bxs-lock-alt');
    // });
    //
    // // toggle Password Confirmation
    // const togglePasswordConfirmation = document.querySelector("#togglePasswordConfirmation");
    // const passwordConfirmation = document.querySelector("#password_confirmation");
    // togglePasswordConfirmation.addEventListener("click", function () {
    //     // toggle the type attribute
    //     const type = passwordConfirmation.getAttribute("type") === "password" ? "text" : "password";
    //     passwordConfirmation.setAttribute("type", type);
    //     // toggle the eye icon
    //     this.classList.toggle('bi-eye-slash-fill');
    //     this.classList.toggle('bi-eye-fill');
    // });

});
