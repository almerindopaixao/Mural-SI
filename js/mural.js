document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'pt-br', // linguagem padrão
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      height: "parent",
      header: botoes(),
      defaultView: $(window).width() < 890 ? 'listMonth':'dayGridMonth', //Definindo a visualização de acordo com o dispositivo
      navLinks: true, // Se você pode clicar nos links de navegação
      businessHours: true, // diferenciar o horario comercial
      editable: true,
      eventLimit: true,
      nowIndicator: true,
      contentHeight: "auto", // Tira a barra de
      events: 'php/lista_eventos.php', //Eventos no banco de dados
      extraParams: () => {
        return {
          cachebuster: new Date().valueOf()
        }
      },
      // Evento de click no evento para aparecer a janela modal
      eventClick: info => {
        $('#apagar-evento').attr('href', 'php/apagar_evento.php?id=' + info.event.id) //Apagar Evento
        info.jsEvent.preventDefault(); //Nunca pegar a url
        $('#visualizar #id').text(info.event.id)
        $('#visualizar #id').val(info.event.id)
        $('#visualizar #title').text(info.event.title)
        $('#visualizar #title').val(info.event.title)
        $('#visualizar #description').text(info.event.extendedProps.description)
        $('#visualizar #description').val(info.event.extendedProps.description)
        $('#visualizar #color').val(info.event.backgroundColor)
        $('#visualizar #start').text(info.event.start.toLocaleString())
        $('#visualizar #start').val(FormataData(info.event.start))
        $('#visualizar #startTime').val(FormataTempo(info.event.start))
        $('#visualizar #end').text(validarNull(info).toLocaleString())
        $('#visualizar #end').val(FormataData(validarNull(info)))
        $('#visualizar #endTime').val(FormataTempo(validarNull(info)))
        $('#visualizar').modal('show');
      },
      selectable: true, // Deixar o dia selecionável
      //Evento de click na janela da data
      select: info => {
        $('#cadastrar #start').val(FormataData(info.start))
        $('#cadastrar #end').val(FormataData(info.end))
        $('#cadastrar').modal('show')
      }

    });

    calendar.render();
  });

//Função que cadastra um evento quando o menu esta no modo responsivo
let botao = window.document.querySelector('.btn-cadastro-resp')
botao.addEventListener('click', function() {
    $('#cadastrar').modal('show')
})

function botoes() {
    /*Função que mostrará os botões de acordo com o tamanho da tela*/
    if ($(window).width() < 890) {
        return {
            left: 'timeGridDay,listMonth',
            right: 'prev,next',
            center: 'title'
        }
    } else {
        return {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        }
    }
}

function validarNull(info) {
    if(info.event.end == null) {
        return info.event.start
    } else {
        return info.event.end
    }
}

function FormataTempo(tempo) {
    hora  = tempo.getHours().toString()
    horaF = (hora.length == 1) ? '0'+hora : hora
    minutos  = tempo.getMinutes().toString() //+1 pois no getMonth Janeiro começa com zero.
    minutosF = (minutos.length == 1) ? '0'+minutos : minutos
    segundos = tempo.getSeconds().toString()
    segundosF = (segundos.length == 1) ? '0'+segundos : segundos

    return horaF + ":" + minutosF + ":" + segundosF;
}

function FormataData(data) {
    dia  = data.getDate().toString()
    diaF = (dia.length == 1) ? '0'+dia : dia
    mes  = (data.getMonth()+1).toString() //+1 pois no getMonth Janeiro começa com zero.
    mesF = (mes.length == 1) ? '0'+mes : mes
    anoF = data.getFullYear()

    return anoF + "-" + mesF + "-" + diaF;
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

/*
defaultView: $(window).width() < 765 ? 'basicDay':'agendaWeek'



// add the responsive classes after page initialization
window.onload = function () {
    $('.fc-toolbar.fc-header-toolbar').addClass('row col-lg-12');
};

*/