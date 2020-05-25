document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'pt-br', // linguagem padrão
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      height: 800,
      header: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      navLinks: true, // Se você pode clicar nos links de navegação
      businessHours: true, // diferenciar o horario comercial
      editable: true,
      eventLimit: true,
      events: 'php/lista_eventos.php', //Eventos no banco de dados
      extraParams: () => {
        return {
          cachebuster: new Date().valueOf()
        }
      },
      // Evento de click no evento para aparecer a janela modal
      eventClick: info => {
        info.jsEvent.preventDefault(); //Nunca pegar a url
        $('#visualizar #id').text(info.event.id)
        $('#visualizar #id').val(info.event.id)
        $('#visualizar #title').text(info.event.title)
        $('#visualizar #title').val(info.event.title)
        $('#visualizar #color').val(info.event.backgroundColor)
        $('#visualizar #start').text(info.event.start.toLocaleString())
        $('#visualizar #start').val(info.event.start.toLocaleString())
        $('#visualizar #end').text(info.event.end.toLocaleString())
        $('#visualizar #end').val(info.event.end.toLocaleString())
        $('#visualizar').modal('show');
      },
      selectable: true, // Deixar o dia selecionável
      //Evento de click na janela da data
      select: info => {
        //alert(`Incio do Evento do evento ${info.start.toLocaleString()}`);
        $('#cadastrar #start').val(info.start.toLocaleString())
        $('#cadastrar #end').val(info.end.toLocaleString())
        $('#cadastrar').modal('show')
      }

    });

    calendar.render();
  });

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode: evento.which
    
    campo = eval(objeto)

    if (campo.value == '00/00/0000 00:00:00') {
        campo.value =  ''
    }

    caracteres = '0123456789'
    separacao1 = '/'
    separacao2 = ' '
    separacao3 = ':'
    conjunto1 = 2
    conjunto2 = 5
    conjunto3 = 10
    conjunto4 = 13
    conjunto5 = 16

    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1) {
            campo.value = campo.value + separacao1
        } else if (campo.value.length == conjunto2) {
            campo.value = campo.value + separacao1
        } else if (campo.value.length == conjunto3) {
            campo.value = campo.value + separacao2
        } else if (campo.value.length == conjunto4) {
            campo.value = campo.value + separacao3
        } else if (campo.value.length == conjunto5) {
            campo.value = campo.value + separacao3
        } 

    } else {
        event.returnValue = false;
    }
}

// Evento que impede que a tela recarregue
// e enviar o formulário
$(document).ready(() => {
    $('#addevent').on('submit', function(event) {
        event.preventDefault()
        $.ajax({
            method: 'POST',
            url: 'php/cadastrar_evento.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(retorna) {
                if (retorna['sit']) {
                    $('#msg-cad').html(retorna['msg'])
                    setTimeout(function() {
                        window.location.reload(1);
                      }, 3000);
                } else {
                    $('#msg-cad').html(retorna['msg'])
                }
            }
        })
    })

    //Mostrando o fomulário para edição do evento
    $('.btn-canc-vis').on('click', function() {
        $('.visevent').slideToggle()
        $('.formedit').slideToggle()
    })

    //Cancelando a edição do evento
    $('.btn-canc-edit').on('click', function() {
        $('.formedit').slideToggle()
        $('.visevent').slideToggle()
    })

    $('#aditevent').on('submit', function(event) {
        event.preventDefault()
        $.ajax({
            method: 'POST',
            url: 'php/editar_evento.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(retorna) {
                if (retorna['sit']) {
                    $('#msg-edit').html(retorna['msg'])
                    setTimeout(function() {
                        window.location.reload(1);
                      }, 3000);
                } else {
                    $('#msg-edit').html(retorna['msg'])
                }
            }
        })
    })  
})