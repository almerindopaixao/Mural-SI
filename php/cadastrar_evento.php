<?php

    include_once 'conexao.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Converter a data e hora por formato para o banco de dados
    $data_start = str_replace('/', '-', $dados['start']);
    $data_start_conv = date('Y-m-d H:i:s', strtotime($data_start ." ".$dados['startTime']));

    $data_end = str_replace('/', '-', $dados['end']);
    $data_end_conv = date('Y-m-d H:i:s', strtotime($data_end." ".$dados['endTime']));

    $query_event = 'INSERT INTO events (title, description, color, start, end) VALUES (:title, :description, :color, :start, :end)';

    $insert_event = $conn->prepare($query_event);
    $insert_event->bindParam(':title', $dados['title']);
    $insert_event->bindParam(':description', $dados['description']);
    $insert_event->bindParam(':color', $dados['color']);
    $insert_event->bindParam(':start', $data_start_conv);
    $insert_event->bindParam(':end', $data_end_conv);

    if($insert_event->execute()) {
        $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento cadastrado com sucesso !</div>'];
    } else {
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento não foi cadastrado com sucesso !</div>'];
    }
    


    header('Content-Type: application/json');
    echo json_encode($retorna);

?>