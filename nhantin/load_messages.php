<?php 
session_start();
$user_id = $_SESSION['user'];
$ketnoi= new mysqli('localhost','root','','MXH');
function getStatus($is_active, $last_activity) {
    if ($is_active == 1) {
        return '<i class="fa-solid fa-circle"></i>';
    } else {
        $time_offline = time() - strtotime($last_activity);
        if ($time_offline < 3600) {
            return floor($time_offline / 60) . 'p';
        } elseif ($time_offline < 86400) {
            return floor($time_offline / 3600) . 'g';
        } elseif ($time_offline < 2592000) {
            return floor($time_offline / 86400) . 'n';
        }else{
            return 'off';
        }
        
    }
}

//tung nhan tin
$friend_default = "SELECT *, MAX(message.timestamp) as latest_timestamp FROM user 
JOIN message ON (message_by = $user_id AND message_to = user_id) OR (message_by = user_id AND message_to = $user_id)
GROUP BY user_id
ORDER BY latest_timestamp DESC";
$result_fr = $ketnoi->query($friend_default);


while ($row_fr = $result_fr->fetch_assoc()) {
$friend_id = $row_fr['user_id'];


// lay tin nhan moi nhat
$sql_latest = "SELECT * FROM message WHERE (message_by=$user_id AND message_to=$friend_id) OR (message_by=$friend_id AND message_to=$user_id) ORDER BY timestamp DESC LIMIT 1";
$result_latest = $ketnoi->query($sql_latest);
if ($result_latest->num_rows > 0) {
    $row_latest = $result_latest->fetch_assoc();
    $latest_content = $row_latest['content'];
} else {
    $latest_content = "Chưa có tin nhắn nào!";
}

// Lấy trạng thái online/offline và thời gian offline gần nhất
$status = getStatus($row_fr['is_active'], $row_fr['last_activity']);


?>
<a href="index.php?pid=0&&m_id=<?php echo $friend_id?>">
    <div class="mess1">
        <div class="ava" style="position:relative;background-image: url('img/<?php echo $row_fr["avartar"]?>');">
            <div style="<?php echo $status == '<i class="fa-solid fa-circle"></i>' ? '':'background:#D3E3D5;'?>position:absolute;left:35px;bottom:-3px;font-size:11px;border-radius:10px;padding:2px 5px;color:#2E9A49;font-weight:500"><?php echo $status ?></div>
        </div>
        <div class="username"><?php echo $row_fr["username"]?> </div><br><br>
        <div class="mini_content"><?php echo $latest_content; ?></div>
    </div> 
</a>
<?php
}
?>

<script>
    window.onload = function() {
        var links = document.querySelectorAll('a');
        var currentUrl = window.location.href;
        var currentMId = currentUrl.split('m_id=')[1];

        for (var i = 0; i < links.length; i++) {
            var linkMId = links[i].href.split('m_id=')[1];
            if (currentMId && linkMId && currentMId === linkMId) {
                links[i].style.backgroundColor = 'gray';
            }
        }
    };
</script>
