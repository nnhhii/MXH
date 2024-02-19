<?php
$ketnoi = new mysqli('localhost', 'root', '', 'MXH');
$message_by = $_POST['message_by'];
$message_to = $_POST['message_to'];
$message_time = date("d/m/y H:i:s ");

if (isset($_FILES['file'])) {
    $thu_muc="img/";
    $ten_files=$thu_muc . $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $ten_files);
    $hinhanh=$_FILES["file"]["name"];
    $sql = "INSERT INTO message (message_to, message_by, content,timestamp) VALUES ('$message_to', '$message_by', '$hinhanh','$message_time')";

    if ($ketnoi->query($sql) === TRUE) {
        echo'
            <div style="width:100%;float:left">
                <img src="img/'.$hinhanh.'" style="width:400px;height:auto;float:right; margin:2px 2%">
                <div style="float:right;color:gray;font-size:12px">'.$message_time.'</div>
            </div> ';
    }
}
elseif (isset($_POST['icon_url'])) {
    $icon =$_POST['icon_url'];
    $sql = "INSERT INTO message (message_to, message_by, content, timestamp) VALUES ('$message_to', '$message_by', '$icon', '$message_time')";
    if ($ketnoi->query($sql) === TRUE) {
        echo '
            <div style="width:100%;float:left">
                <img src="'.$icon.'" style="width:40px;height:40px;float:right; margin:2px 2%">
                <div style="float:right;color:gray;font-size:12px">'.$message_time.'</div>
            </div>';
    }
}
else {
        $content = $_POST['content'];
        $sql = "INSERT INTO message (message_by, message_to, content,timestamp) VALUES ('$message_by', '$message_to', '$content','$message_time')";

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
                    font-size:17px'>" .$content ."
                    </div>
                <div style='float:right;color:gray; margin-top:15px;font-size:12px'>".$message_time."</div>
            </div>";
        }
    }
?>
