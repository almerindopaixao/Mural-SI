<!DOCTYPE html>
<html lang="Pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ff0000">
  <title>Mural da Turma</title>
  <link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/icon//favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/icon//favicon-16x16.png">
  <link rel="manifest" href="img/icon//site.webmanifest">
  <link rel="mask-icon" href="img/icon//safari-pinned-tab.svg" color="#5bbad5">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mural.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/rodape.css">
  <link rel='stylesheet' href='css/core/main.min.css'>
  <link rel='stylesheet' href='css/daygrid/main.min.css'>
  <link rel='stylesheet' href='css/timegrid/main.min.css'>
  <link rel='stylesheet' href='css/list/main.min.css'>
</head>

<body>
  <!--Chamando menu-->
  <?php
  include('html/menu.html')
  ?>
  <main>
    <!--Calendário-->
    <div id='calendar'></div>

    <!-- Janela Modal para descrever o evento -->
    <div class="modal fade" id="visualizar" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <svg class="bi bi-calendar-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
              <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            <h5 class="modal-title" id="staticBackdropLabel">&nbsp;&nbsp;Informações do Evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Informações do evento-->
          <div class="modal-body">
            <div class="visevent">
              <dl class="row">
                <dt class="col-sm-3">ID do evento</dt>
                <dd class="col-sm-9" id="id"></dd>

                <dt class="col-sm-3">Título</dt>
                <dd class="col-sm-9" id="title"></dd>

                <dt class="col-sm-3">Descrição</dt>
                <dd class="col-sm-9" id="description"></dd>

                <dt class="col-sm-3">Início do Evento</dt>
                <dd class="col-sm-9" id="start"></dd>

                <dt class="col-sm-3">Final do Evento</dt>
                <dd class="col-sm-9" id="end"></dd>
              </dl>
              <button class="btn btn-warning btn-canc-vis">Editar</button>
              <a href="" id="apagar-evento" class="btn btn-danger bnt-lg">Apagar</a>
            </div>
            <!--Formulário para editar o evento-->
            <div class="formedit">
              <span id="msg-edit"></span>
              <form id="aditevent" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Título</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Título do Evento">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Descrição</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" rows="6" placeholder="Enforme a descrição do evento"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Cor</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="color" id="color" name="color">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Data Inicial</label>
                  <div class="col">
                    <input type="date" name="start" class="form-control" id="start">
                  </div>
                  <label class="col-sm-2 col-form-label">Hora Inicial</label>
                  <div class="col">
                    <input type="time" name="startTime" class="form-control" id="startTime">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Data Final</label>
                  <div class="col">
                    <input type="date" name="end" class="form-control" id="end">
                  </div>
                  <label class="col-sm-2 col-form-label">Hora Final</label>
                  <div class="col">
                    <input type="time" name="endTime" class="form-control" id="endTime">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="button" class="btn btn-danger btn-canc-edit">Cancelar</button>
                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Salvar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Janela Modal para cadastrar o evento -->
    <div class="modal fade" id="cadastrar" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <svg class="bi bi-calendar-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
              <path fill-rule="evenodd" d="M7.5 9.5A.5.5 0 0 1 8 9h2a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0v-2z" />
              <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
              <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            <h5 class="modal-title" id="staticBackdropLabel">&nbsp;&nbsp;Cadastrar evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Formulário para cadastro-->
          <div class="modal-body">
            <span id="msg-cad"></span>
            <form id="addevent" method="POST" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Título do Evento">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" id="description" rows="6" placeholder="Enforme a descrição do evento"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cor</label>
                <div class="col-sm-10">
                  <input class="form-control" type="color" id="color" name="color">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Data Inicial</label>
                <div class="col">
                  <input type="date" min="2019-05-27" max="2030-05-27" name="start" class="form-control" id="start">
                </div>
                <label class="col-sm-2 col-form-label">Hora Inicial</label>
                <div class="col">
                  <input type="time" name="startTime" class="form-control" id="startTime">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Data Final</label>
                <div class="col">
                  <input type="date" name="end" class="form-control" id="end">
                </div>
                <label class="col-sm-2 col-form-label">Hora Final</label>
                <div class="col">
                  <input type="time" name="endTime" class="form-control" id="endTime">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--Chamando rodapé-->
  <?php
  include('html/rodape.html')
  ?>

  <!--Botão para cadastro-->
  <div class="cadastro-resp fixed-bottom">
    <div class="btn-cadastro-resp">
      <svg class="bi bi-calendar-plus" width="40px" height="40px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
        <path fill-rule="evenodd" d="M7.5 9.5A.5.5 0 0 1 8 9h2a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0v-2z" />
        <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z" />
      </svg>
    </div>
  </div>

  <script src="js/script.js"></script>
  <script src='js/core/main.min.js'></script>
  <script src='js/interaction/main.min.js'></script>
  <script src='js/daygrid/main.min.js'></script>
  <script src='js/timegrid/main.min.js'></script>
  <script src='js/list/main.min.js'></script>
  <script src='js/core/locales/pt-br.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/mural.js"></script>
</body>

</html>