<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
$ketnoi= new mysqli('localhost','root','','MXH');     
if (isset($_GET['m_id'])){
  $m_id = $_GET['m_id'];
$friend_details = "select * from user where user_id = $m_id";
$result_dt = $ketnoi->query($friend_details);
$row_dt = $result_dt ->fetch_assoc();}

?>
</head>
<style>
.bia {
    margin: 11vh 5% 0 5%;
    height:34vw;
    width:90%; 
    border-radius:5px;
}
.bia > .bia1 {
  float:right;
  width:78%;
  background-size: cover;
  border-radius: 0 5px 5px 0;
  height:34vw
}
.bia >.khungcanhan {
  background: linear-gradient(to bottom, gray, white);
  float:left;
  height:34vw;
  width:22%;
  border-radius:5px 0 0 5px ;
  position: relative;
}
.bia > .khungcanhan > .canhan1 {
  height:15vh;
  position: relative;
  padding:9vh 0 2vh 0
}
.bia >.khungcanhan > .canhan1 > .anhdaidien{
  background-size: cover;
  background-position: center;
  width: 15vh;
  height:15vh;
  border-radius: 50%;
  margin:auto;
  border: 3px solid white;
}
.bia >.khungcanhan > .name{
  font-family: Helvetica, Arial, sans-serif;
  font-size: 1.8vw;
  text-align: center
}
.bia >.khungcanhan > .name > .banbe{
  font-size: 1vw;
  color: dimgray;
}
.bia >.khungcanhan > .name > .tieusu{
  font-size: 1.2vw
}
.bia >.khungcanhan > .congcu{
  right:0;
  left:0;
  padding: 5vw 0.9vw 0 0.9vw;
  position: absolute;
  white-space: nowrap;
}
.bia >.khungcanhan > .congcu >.congcu1{
  margin:  0.5vw;
  font-size: 1.1vw;
  padding: 1vw 2vw;
  border: none;
  border-radius: 5px;
  background-color: #cecdca;
}
.bia >.khungcanhan > .congcu1:hover {
  background-color: #343a40;
  color: #f8f9fa;
}
.story_banbe {
  width: 100%;
  height: 15vh;
  margin-top: 1%;
  background-color: #cecdca;
  float: left;
}
.story_banbe > .circle {
  height: 12vh;
  width: 12vh;
  background-color: none;
  border-radius: 50%;
  float: left;
  margin-top: 0.8%;
  margin-left: 6%;
  border: 2px solid white;
  box-shadow: 0 0 0 0.7px dimgray;
}
@media(max-width:980px){
  .bia > .khungcanhan{
    width: 40%;
    top:-10vh;
    left:28vw;
    height: 50vh;
    background: transparent;
    float: left;
  }
  .bia > .khungcanhan >.canhan1{
    padding:2vw;
  }
  .bia > .khungcanhan >.canhan1 > .anhdaidien{
    width: 15vh;
    height:15vh;
  }
  .bia >.khungcanhan > .name{
    font-size: 3.5vh;
  }
  .bia >.khungcanhan > .name > .banbe{
    font-size: 2vh;
  }
  .bia >.khungcanhan > .name > .tieusu{
    font-size: 2vh
  }
  .bia{
    width: 100%;
    margin: 6.5vh 0 0 0;
  }
  .bia > .bia1{
    width: 100%;
    height: 40vh;
  }
  .bia >.khungcanhan>.congcu{
    padding: 2vw;
    white-space: nowrap;
  }
  .bia > .khungcanhan >.congcu > .congcu1{
    margin-left:  1.4vw;
    font-size: 2.5vh;
    padding: 1.8vw 4vw;
  }
  .story_banbe{
    margin-top: -10vh;
  }
}
@media(max-width:630px){
  .bia >.khungcanhan {
    width: 70%;
    top:-9vh;
    left:15vw
  }
  .bia >.khungcanhan>.congcu{
    padding: 2vw;
    white-space: nowrap;
  }
  .bia > .khungcanhan >.congcu > .congcu1{
    margin-left: 5vw;
    font-size: 2.5vh;
    padding: 2.5vw 6vw;
  }
}
    
</style>
<body>
<div class="bia">
  <div class="bia1" style="background-image: url('img/<?php echo $row_dt["cover_picture"]?>')"></div>
  <div class="khungcanhan">
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_dt["avartar"]?>')"></div>
    </div>
    <div class="name">
      <div><strong><?php echo $row_dt["username"]?></strong></div>
      <div class="banbe"><br>2939 bạn bè </div>
      <div class="tieusu"><br><?php echo $row_dt["bio"]?></div>
    </div>
    <div class="congcu">
      <button  class="congcu1">Nhắn tin</button>
      <button  class="congcu1">Kết bạn</button>
    </div>

  </div>
</div>
<div class="story_banbe">
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
</div>
