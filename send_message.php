<?php
if (isset($_POST['message_to']) && isset($_POST['content'])) {
    $message_to = $_POST['message_to'];
    $content = $_POST['content'];
    $ketnoi = new mysqli('localhost', 'root', '', 'MXH');
    $sql = "INSERT INTO message (message_to, content) VALUES ('$message_to', '$content')";
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
                font-size:17px'> $content  
            </div>
        </div>";
    }
    // $uploadDir = 'uploads/';  // Directory where uploaded files will be stored
    // $filename = $_FILES['file']['name'];
    // $uploadFile = $uploadDir . basename($filename);

    // if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
    //     // File was successfully uploaded
    //     $fileUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $uploadFile;

    //     // Insert the file URL into the database
    //     $ketnoi = new mysqli('localhost', 'root', '', 'MXH');
    //     $sql = "INSERT INTO message (message_to, message_by, content) VALUES ('$message_to', '$message_by', '$fileUrl')";
        
    //     if ($ketnoi->query($sql) === TRUE) {
    //         // Return JSON response with file information
    //         echo json_encode(['url' => $fileUrl, 'filename' => $filename]);
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $ketnoi->error;
    //     }
    // } else {
    //     echo "File upload failed";
    // }
}
?>
