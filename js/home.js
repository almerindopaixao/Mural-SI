main()

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

    }


    animeScroll();
    window.addEventListener('scroll', debounce(animeScroll, 100))

}

function main() {
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

    animar_conteudo(debounce)


    // Evento que deixa o scroll suave
    const meuItem = document.querySelector('.boas-vindas div a');
    meuItem.addEventListener('click', event => {
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

});

}