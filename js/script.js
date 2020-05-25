main();

function efeito_menu() {
    // Função que faz com o menu mude a transparência de acordo
    // com a rolagem do scroll
    const scrolled = Number(window.scrollY);

    const elemento = window.document.querySelector('header')

    //verifica se esta no modo responsível
    const verifica = verifica_responsivel();

    if (scrolled == 0) {
        elemento.setAttribute('id', 'cabecalho')
    } else if (scrolled >= 50) {
        elemento.setAttribute('id', 'cabecalho-modificado')
    } 
}

function verifica_responsivel() {
    // Verifica se o site está no modo responsivo ou não
    const tamanho = Number(window.innerWidth)

    if (tamanho <= 890) {
        return true;
    } else {
        return false;
    }
}

function sair_lightbox() {
    //Função que faz com que saia do lightbox
    const check = window.document.querySelector('#btn-menu')

    const screen = window.document.querySelector('html')

    if (check.checked == true) {
        screen.style.overflowY = 'visible'
    }

    check.checked = false
}

function sumir_scroll() {
    //Função que faz com que o scroll suma quando o menu
    //esta no modo responsivo

    const check = window.document.querySelector('#btn-menu')

    const screen = window.document.querySelector('html')

    if (check.checked == false) {
        screen.style.overflowY = 'hidden'
    }
}

function main() {
    //Função principal
    //Debounce do Lodash
    //Evita que o evento seja executado o tempo todo
    const debounce = function(func, wait, immediate) {
        let timeout;
        return function(...args) {
          const context = this;
          const later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
          };
          const callNow = immediate && !timeout;
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
          if (callNow) func.apply(context, args);
        };
      };

    // Evento que coloca o efeito no menu
    window.addEventListener('scroll', debounce(efeito_menu, 100));

    // Sair do lightbox
    const lightbox = document.querySelector('.bg')
    lightbox.addEventListener('click', sair_lightbox)

    // Sumir scroll
    const label = document.querySelector('#label-menu')
    label.addEventListener('click', sumir_scroll)

}

