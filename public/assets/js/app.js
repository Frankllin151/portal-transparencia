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




function aplicarDataTablePadrao() {
  const tabelas = document.querySelectorAll("table");

  tabelas.forEach((tabela, index) => {
    if (tabela.hasAttribute('data-no-datatable')) return;

    const ths = tabela.querySelectorAll("thead th");
    const tds = tabela.querySelectorAll("tbody td");

    // Aplica estilo sempre
    tabela.style.border = "0.3px solid #ccc";
    tabela.style.borderCollapse = "collapse";

    ths.forEach(th => {
      th.style.padding = "8px";
      th.style.backgroundColor = "#f8f8f8";
      if (index === 0) {
        th.setAttribute("scope", "col");
      }
    });

    tds.forEach(td => {
      td.style.padding = "8px";
      td.style.borderTop = "1px solid #ccc";
    });

    if (index === 0) {
      const idTabela = `dataTable_${index}`;
      tabela.id = idTabela;

      // Verifica se existem TRs reais com número de TDs compatível
      const linhasValidas = Array.from(tabela.querySelectorAll("tbody tr")).filter(tr => {
        const colunas = tr.querySelectorAll("td");
        return colunas.length === ths.length;
      });

      if (linhasValidas.length > 0) {
        new DataTable(`#${idTabela}`, {
          language: {
            info: "Mostrando de _START_ a _END_ de _TOTAL_ entradas",
            lengthMenu: "Mostrar _MENU_ registros por página",
            search: "Buscar:"
          }
        });
      } else {
        console.log("Tabela ignorada por não ter dados válidos para o DataTable.");
      }
    }
  });
}

document.addEventListener("DOMContentLoaded", aplicarDataTablePadrao);




document.addEventListener('DOMContentLoaded', function() {
    // Seleciona todas as tags <link> com rel="icon"
    const iconLinks = document.querySelectorAll('link[rel="icon"]');

    // Define o novo caminho para o ícone.
    // Lembre-se que esta URL já deve estar resolvida pelo Laravel no HTML final.
    const newHref = '/assets/images/facivon.png';

    // Itera sobre cada tag encontrada e modifica seus atributos
    iconLinks.forEach(link => {
        link.href = newHref;
        link.sizes = '16x16';
        console.log('Link do ícone modificado:', link.outerHTML);
    });

    // Se não houver nenhum <link rel="icon"> e você quiser adicionar um, pode fazer assim:
    if (iconLinks.length === 0) {
        const newIconLink = document.createElement('link');
        newIconLink.rel = 'icon';
        newIconLink.href = newHref;
        newIconLink.sizes = '16x16';
        document.head.appendChild(newIconLink);
        console.log('Novo link de ícone adicionado:', newIconLink.outerHTML);
    }
});

/// real moeda


$(document).ready(function(){
  $('.moedaBr').each(function(){
    let valor = $(this).val();
    if(valor && !valor.includes(',')) {
      valor = parseFloat(valor).toFixed(2).replace('.', ',');
      $(this).val(valor);
    }
  });

  $('.moedaBr').mask('000.000.000.000.000,00', {reverse: true});
});




// mascara cpf/cnpj: 

document.querySelectorAll('.cpf-cnpj-mask').forEach(function(input) {
  input.addEventListener('input', function() {
    let value = input.value;

    // Remove tudo que não for número
    value = value.replace(/\D/g, '');

    // Verifica o tamanho para decidir se é CPF ou CNPJ
    if (value.length <= 11) { // Potencialmente um CPF (ou ainda não atingiu o tamanho do CNPJ)
      // Limita o número de caracteres para 11 (CPF)
      if (value.length > 11) {
        value = value.substring(0, 11);
      }

      // Aplica a máscara de CPF: 000.000.000-00
      if (value.length > 9) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
      } else if (value.length > 6) {
        value = value.replace(/^(\d{3})(\d{3})(\d{3})$/, '$1.$2.$3');
      } else if (value.length > 3) {
        value = value.replace(/^(\d{3})(\d{3})$/, '$1.$2');
      } else if (value.length > 0) {
        value = value.replace(/^(\d{3})$/, '$1');
      }

    } else { // Provavelmente um CNPJ
      // Limita o número de caracteres para 14 (CNPJ)
      if (value.length > 14) {
        value = value.substring(0, 14);
      }

      // Aplica a máscara de CNPJ: 00.000.000/0000-00
      if (value.length > 12) {
        value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');
      } else if (value.length > 8) {
        value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})$/, '$1.$2.$3/$4');
      } else if (value.length > 5) {
        value = value.replace(/^(\d{2})(\d{3})(\d{3})$/, '$1.$2.$3');
      } else if (value.length > 2) {
        value = value.replace(/^(\d{2})(\d{3})$/, '$1.$2');
      } else if (value.length > 0) {
        value = value.replace(/^(\d{2})$/, '$1');
      }
    }

    input.value = value;
  });
});



$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});



$(document).ready(function(){
  $('.money').each(function(){
    let valor = $(this).val();
    if(valor && !valor.includes(',')) {
      valor = parseFloat(valor).toFixed(2).replace('.', ',');
      $(this).val(valor);
    }
  });

  $('.money').mask('000.000.000.000.000,00', {reverse: true});
});
