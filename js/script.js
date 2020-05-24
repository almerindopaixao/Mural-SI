main();

function animar_conteudo(debounce) {
    // Função que faz animar o conteúdo

    const informacoes =  document.querySelector('#informacoes')
    const lista_alunos = document.querySelector('#lista-alunos')
    const conteudo = window.document.querySelector('#conteudo')
    const animationClass = 'animate'

    function animeScroll() {
        const scrolled = window.pageYOffset
        if (scrolled >= conteudo.offsetTop - 400) {
            informacoes.classList.add(animationClass)
            lista_alunos.classList.add(animationClass)
        } else {
            informacoes.classList.remove(animationClass)
            lista_alunos.classList.remove(animationClass)
        }

        console.log('iai')

    }


    animeScroll();
    window.addEventListener('scroll', debounce(animeScroll, 100))

}

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

function rolagem_suave (event) {
    // Função que pega a posição do elemento linkado e leva a tela
    // até sua posição
    event.preventDefault();
    const elemento = event.target
    const id = elemento.getAttribute('href')
    const posiction_section = document.querySelector(id).offsetTop

    const verifica = verifica_responsivel();

    let tamanho_min = 100

    if (verifica === true) {
        tamanho_min = 54
    }

    window.scroll({
        top: posiction_section - tamanho_min,
        behavior: 'smooth'
    })
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

    // Evento que deixa o scroll suave
    const meuItem = document.querySelector('.boas-vindas div a');
    meuItem.addEventListener('click', rolagem_suave);

    // Sair do lightbox
    const lightbox = document.querySelector('.bg')
    lightbox.addEventListener('click', sair_lightbox)

    // Sumir scroll
    const label = document.querySelector('#label-menu')
    label.addEventListener('click', sumir_scroll)

    //Animação do conteúdo
    animar_conteudo(debounce);

}

