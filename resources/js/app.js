import './bootstrap';

// jQuery
import jQuery from 'jquery';
window.$ = jQuery;

// Selectize
import '@selectize/selectize/dist/js/standalone/selectize';

$(document).ready(function() {
    $(".selectize").selectize();
});
