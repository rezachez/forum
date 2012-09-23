<?php
    $imageInfo = pathinfo($_FILES['file']['name']);
    $imagePath = "./files/images/notes/" . date('YmdHis') . '.' . $imageInfo['extension'];
    move_uploaded_file($_FILES['file']['tmp_name'], $imagePath);
    $array = array('filelink' => $imagePath);
    echo stripslashes(json_encode($array));
?>