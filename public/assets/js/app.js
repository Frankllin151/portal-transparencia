(function ($) {
  'use strict';

  // sidebar submenu collapsible js
  $(".sidebar-menu .dropdown").on("click", function(){
    var item = $(this);
    item.siblings(".dropdown").children(".sidebar-submenu").slideUp();

    item.siblings(".dropdown").removeClass("dropdown-open");

    item.siblings(".dropdown").removeClass("open");

    item.children(".sidebar-submenu").slideToggle();

    item.toggleClass("dropdown-open");
  });

  $(".sidebar-toggle").on("click", function(){
    $(this).toggleClass("active");
    $(".sidebar").toggleClass("active");
    $(".dashboard-main").toggleClass("active");
  });

  $(".sidebar-mobile-toggle").on("click", function(){
    $(".sidebar").addClass("sidebar-open");
    $("body").addClass("overlay-active");
  });

  $(".sidebar-close-btn").on("click", function(){
    $(".sidebar").removeClass("sidebar-open");
    $("body").removeClass("overlay-active");
  });

  //to keep the current page active
  $(function () {
    for (
      var nk = window.location,
        o = $("ul#sidebar-menu a")
          .filter(function () {
            return this.href == nk;
          })
          .addClass("active-page") // anchor
          .parent()
          .addClass("active-page");
      ;

    ) {
      // li
      if (!o.is("li")) break;
      o = o.parent().addClass("show").parent().addClass("open");
    }
  });

/**
* Utility function to calculate the current theme setting based on localStorage.
*/
function calculateSettingAsThemeString({ localStorageTheme }) {
  if (localStorageTheme !== null) {
    return localStorageTheme;
  }
  return "light"; // default to light theme if nothing is stored
}

/**
* Utility function to update the button text and aria-label.
*/
function updateButton({ buttonEl, isDark }) {
  const newCta = isDark ? "dark" : "light";
  buttonEl.setAttribute("aria-label", newCta);
  buttonEl.innerText = newCta;
}

/**
* Utility function to update the theme setting on the html tag.
*/
function updateThemeOnHtmlEl({ theme }) {
  document.querySelector("html").setAttribute("data-theme", theme);
}

/**
* 1. Grab what we need from the DOM and system settings on page load.
*/
const button = document.querySelector("[data-theme-toggle]");
const localStorageTheme = localStorage.getItem("theme");

/**
* 2. Work out the current site settings.
*/
let currentThemeSetting = calculateSettingAsThemeString({ localStorageTheme });

/**
* 3. If the button exists, update the theme setting and button text according to current settings.
*/
if (button) {
  updateButton({ buttonEl: button, isDark: currentThemeSetting === "dark" });
  updateThemeOnHtmlEl({ theme: currentThemeSetting });

  /**
  * 4. Add an event listener to toggle the theme.
  */
  button.addEventListener("click", (event) => {
    const newTheme = currentThemeSetting === "dark" ? "light" : "dark";

    localStorage.setItem("theme", newTheme);
    updateButton({ buttonEl: button, isDark: newTheme === "dark" });
    updateThemeOnHtmlEl({ theme: newTheme });

    currentThemeSetting = newTheme;
  });
} else {
  // If no button is found, just apply the current theme to the page
  updateThemeOnHtmlEl({ theme: currentThemeSetting });
}


// =========================== Table Header Checkbox checked all js Start ================================
$('#selectAll').on('change', function () {
  $('.form-check .form-check-input').prop('checked', $(this).prop('checked')); 
}); 

  // Remove Table Tr when click on remove btn start
  $('.remove-btn').on('click', function () {
    $(this).closest('tr').remove(); 

    // Check if the table has no rows left
    if ($('.table tbody tr').length === 0) {
      $('.table').addClass('bg-danger');

      // Show notification
      $('.no-items-found').show();
    }
  });
  // Remove Table Tr when click on remove btn end
})(jQuery);






const warningButtons = document.getElementsByClassName('btn-warning');

for (let i = 0; i < warningButtons.length; i++) {
  warningButtons[i].addEventListener('click', function () {
    window.print(); // This is equivalent to Ctrl+P
  });
}


//// ignorar aviso do DataTable alert
// No início do seu script, antes de tudo mais
const originalAlert = window.alert;

window.alert = function(message) {
    // Verifica se a mensagem contém a string específica do alerta do DataTables
    if (message && typeof message === 'string' && message.includes('DataTables warning: table id=dataTable_0 - Incorrect column count')) {
        console.log('Alerta do DataTables interceptado e ignorado:', message);
        return; // Impede que o alerta seja exibido
    }
    // Para todos os outros alertas, exibe o alerta original
    originalAlert.apply(window, arguments);
};

// ... (seu código aplicarDataTablePadrao)
document.addEventListener("DOMContentLoaded", aplicarDataTablePadrao);


/// Adicionar ids dataTable  em todas os sistemas 
// e scope="col"
function aplicarDataTablePadrao() {
  const tabelas = document.querySelectorAll("table");

  tabelas.forEach((tabela, index) => {
    // Ignora tabelas com o atributo data-no-datatable="true"
    if (tabela.hasAttribute('data-no-datatable')) return;

    // Define um ID único para cada tabela
    const idTabela = `dataTable_${index}`;
    tabela.id = idTabela;

    // Aplica estilo à tabela
    tabela.style.border = "0.3px solid #ccc";
    tabela.style.borderCollapse = "collapse";

    // Aplica estilo às células th e td
    const ths = tabela.querySelectorAll("thead th");
    ths.forEach(th => {
      th.setAttribute("scope", "col");
     
    
    });

    const tds = tabela.querySelectorAll("tbody td");
    tds.forEach(td => {
    
     
    });

    // Inicializa o DataTable para essa tabela
    new DataTable(`#${idTabela}`, {
      language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        search: "Buscar:"
      }
    });
  });
}

// Espera o DOM carregar antes de executar
document.addEventListener("DOMContentLoaded", aplicarDataTablePadrao);

