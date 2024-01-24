<?php
$message_by = $_POST['message_by'];
$message_to = $_POST['message_to'];

if (isset($_FILES['file'])) {
    $upload = 'send_files/';
    $filename = $_FILES['file']['name'];
    $uploadFile = $upload . basename($filename);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        $fileUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/Social_Media1/' . $uploadFile;
        $ketnoi = new mysqli('localhost', 'root', '', 'MXH');
        $sql = "INSERT INTO message (message_to, message_by, content) VALUES ('$message_to', '$message_by', '$fileUrl')";

        if ($ketnoi->query($sql) === TRUE) {
            echo json_encode(['url' => $fileUrl, 'filename' => $filename]);
        } 
    }
}else {
        $content = $_POST['content'];
        $ketnoi = new mysqli('localhost', 'root', '', 'MXH');
        $sql = "INSERT INTO message (message_by, message_to, content) VALUES ('$message_by', '$message_to', '$content')";

        if ($ketnoi->query($sql) === TRUE) {
            echo "
            <div style='width:100%;float:left'>
                <div style='
                    max-width:60%;
                    overflow-wrap:break-word;
                    padding:10px;
                    border-radius:18px;
                    background: lightgray;
                    float:right;
                    margin:2px 2%;
                    font-size:17px'>" .$content .
                "</div>
            </div>";
        }
    }
?>
