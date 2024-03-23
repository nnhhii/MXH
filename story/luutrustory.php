<?php
$sql_story = "SELECT * FROM story 
left JOIN user ON story.user_id = user.user_id
WHERE story.user_id= $user_id";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style>
  .story{
    width: 180px !important;
    height:285px !important;
    margin: 0.35% !important;
  }
</style>
<div class="gop_2_menu">
    <div style="width:80%;margin:5% auto">
    <h4 style="margin-left:-5%">Lưu trữ story</h4>
<?php include 'story/hienthistory.php'?>
</div></div>