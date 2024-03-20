<?php
$ketnoi = new mysqli('localhost', 'root', '', 'MXH');
$message_by = $_POST['message_by'];
$message_to = $_POST['message_to'];
$message_time = date("Y-m-d H:i:s");

if (isset($_FILES['file'])) {
    $thu_muc="../img/";
    $ten_files=$thu_muc . $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $ten_files);
    $hinhanh=$_FILES["file"]["name"];
    $sql = "INSERT INTO message (message_to, message_by, content,timestamp) VALUES ('$message_to', '$message_by', '$hinhanh','$message_time')";

    if ($ketnoi->query($sql) === TRUE) {
        echo'
            <div style="width:100%;float:left">
                <img src="img/' . $hinhanh . '" class="other-image"/>
                <div style="float:right;color:gray;font-size:12px">'.$message_time.'</div>
            </div> ';
    }
}
else {
        $content = $_POST['content'];
        $sql = "INSERT INTO message (message_by, message_to, content,timestamp) VALUES ('$message_by', '$message_to', '$content','$message_time')";

        if ($ketnoi->query($sql) === TRUE) {
            echo "
            <div style='width:100%;float:left'>
                <div class='text'>" .$content ."
                    </div>
                <div class='message_time'>".$message_time."</div>
            </div>";
        }
    }
?>
