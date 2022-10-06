import './bootstrap';

// jQuery
import jQuery from 'jquery';
window.$ = jQuery;

// Selectize
import '@selectize/selectize/dist/js/standalone/selectize';

$(document).ready(function() {

    // initialize Selectize
    $(".selectize").selectize();

    // toggle Password
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('bi-eye-slash-fill');
        this.classList.toggle('bi-eye-fill');
    });

    // toggle Password Confirmation
    const togglePasswordConfirmation = document.querySelector("#togglePasswordConfirmation");
    const passwordConfirmation = document.querySelector("#password_confirmation");
    togglePasswordConfirmation.addEventListener("click", function () {
        // toggle the type attribute
        const type = passwordConfirmation.getAttribute("type") === "password" ? "text" : "password";
        passwordConfirmation.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('bi-eye-slash-fill');
        this.classList.toggle('bi-eye-fill');
    });

});
