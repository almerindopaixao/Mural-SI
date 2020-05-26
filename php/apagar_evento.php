<?php
    include_once 'conexao.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)) {
        $query_event = "DELETE FROM events WHERE id=:id";
        $delete_event = $conn->prepare($query_event);

        $delete_event->bindParam('id', $id);

        if ($delete_event->execute()) {           
            header('Location: ../mural.php');

        } else {
            header('Location: ../mural.php');
        }
    
    } else {
        header('Location: ../mural.php');
    }
?>