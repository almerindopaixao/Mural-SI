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
            <svg class="bi bi-calendar-date" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
              <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
              <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            <h5 class="modal-title" id="staticBackdropLabel">&nbsp; &nbsp;Informações do Evento</h5>
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
                    <select name="color" class="form-control" id="color">
                      <option value="">Selecione</option>
                      <option style="color:#0071c5" value="#0071c5">Azul</option>
                      <option style="color:#ff0000" value="#ff0000">vermelho</option>
                      <option style="color:#228b22" value="#228b22">Verde</option>
                      <option style="color:#ffd700" value="#ffd700">Amarelo</option>
                      <option style="color:#a020f0" value="#a020f0">Roxo</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Início</label>
                  <div class="col-sm-10">
                    <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Final</label>
                  <div class="col-sm-10">
                    <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
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
            <h5 class="modal-title" id="staticBackdropLabel">Cadastrar evento</h5>
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
                  <select name="color" class="form-control" id="color">
                    <option value="">Selecione</option>
                    <option style="color:#0071c5" value="#0071c5">Azul</option>
                    <option style="color:#ff0000" value="#ff0000">vermelho</option>
                    <option style="color:#228b22" value="#228b22">Verde</option>
                    <option style="color:#ffd700" value="#ffd700">Amarelo</option>
                    <option style="color:#a020f0" value="#a020f0">Roxo</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Início</label>
                <div class="col-sm-10">
                  <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Final</label>
                <div class="col-sm-10">
                  <input type="text" name="end" class="form-control" id="end" onkeypress="DataHora(event, this)">
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
</body>
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

</html>