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
            <h5 class="modal-title" id="staticBackdropLabel">Descrição do evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Informações do evento-->
          <div class="modal-body">
            <dl class="row">
              <dt class="col-sm-3">ID do evento</dt>
              <dd class="col-sm-9" id="id"></dd>

              <dt class="col-sm-3">Título</dt>
              <dd class="col-sm-9" id="title"></dd>

              <dt class="col-sm-3">Início do Evento</dt>
              <dd class="col-sm-9" id="start"></dd>

              <dt class="col-sm-3">Final do Evento</dt>
              <dd class="col-sm-9" id="end"></dd>
            </dl>
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
            <form>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Título</label>
                  <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Título do Evento">
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
                    <input style="background:var(--cor-efeito)" type="button" name="CadEvent" id="CadEvent" value="Cadastrar" class="btn btn-success btn-lg">
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