<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    body {
    margin: 0;
    padding: 0;
    overflow-y: scroll;
    box-sizing: border-box;
        }
    .bia {
        margin: 5.5% 5% 0 5%;
        height:65%;
        width:90%; 
        border-radius:5px; 
        position: relative;
        z-index:0;
    }
    .bia1 {
      float:right;
      width:78%;
    }
    .khungcanhan {
      background-color:white;
      float:left;
      height:100%; 
      width:22%;
      border-radius:5px;
      position: absolute;
      background: linear-gradient(to bottom, gray, white);

    }
    .canhan1 {
      height:40%;
      position: relative;
      border-radius:5px 5px 0 0;
    }
    .name {
      height:45% ;
      text-align:center;
      font-family:Helvetica, Arial,sans-serif;
      font-size: 2vw;
    }
    
    .banbe {
      height:25%;
      top:0%;
      font-size:1vw;
      color:dimgray;
      margin-top:-5%;
    }
    .anhdaidien {
        height: 60%;
        width: 40%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        border:3px solid white;
    }
    .tieusu {
      height:50%;
      font-size:1.3vw
    }
    .congcu {
  display: flex;
  justify-content: space-around; 
}

.congcu1 {
  font-size: 1.5vw;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #cecdca;
  color: #343a40;
  cursor: pointer;
}

.congcu1:hover {
  background-color: #343a40;
  color: #f8f9fa;
}

    .story {
      height: 8.8vw; 
      margin-top:1%;
      background-color:#cecdca;
    }
    .circle {
  height: 7vw;
  width: 7vw;
  background-color:none;
  border-radius: 50%;
  display: inline-block;
  margin-top:0.8%;
  margin-left:6%;
  border:2px solid white;
  box-shadow: 0 0 0 0.7px dimgray;
}

    @media (max-width: 660px) {
    .bia {
        height:38%;
        width:100%; 
        margin:0;
        position: relative;
    }
    .bia1  {
        width: 100%;
        margin-top:8%;
        border-radius:0;
    }
    .anhdaidien {
        position: static;
        height: 100%;
        width: 100%;
        position: absolute;
        background-color:none;
      }
    .khungcanhan {
        position: sticky; 
        top: 540px; 
        left: 32%;
        background:none;
        transform: translate(25%, -20%);
        background: 
    }
    .canhan1 {
      border-radius:50%;
    }
    .congcu {
  display: flex;
  justify-content: space-around;
}

.congcu1 {
  font-size: 3vw;
  padding: 1vw 17vw;
  border-radius: 5px;
  background-color: #cecdca;
  cursor: pointer;
  height:8vw;
  margin-left:5vw;
  margin-top:3vw;
  white-space: nowrap;
}

.congcu1:hover {
  background-color: #343a40;
  color: #f8f9fa;
}

    .name {
      height:45% ;
      text-align:center;
      font-family:Helvetica, Arial,sans-serif;
      font-size: 5.2vw;
      margin-top:10%
    }
    .tieusu {
      height:50%;
      font-size:3.5vw;
      width: 200%;
      margin-left:-50%;
    }
    .banbe {
      height:25%;
      top:0%;
      font-size:3vw;
      color:dimgray;
      margin-top:-10%;
    }
    .story {
      height: 16vw; 
      margin-top:55%;
      background-color:#cecdca;
    }
    .circle {
  height: 12vw;
  width: 12vw;
  background-color:none;
  border-radius: 50%;
  display: inline-block;
  margin-top:1.9%;
  margin-left:0.5vw;
  border:1.5px solid white;
  box-shadow: 0 0 0 0.7px dimgray;
  
}

    

    }
</style>
<body>
<div style="height:10%; position: fixed;top: 0;width: 100%;background-color:#cecdca; width:100%;z-index:2"> </div>
<div class="bia">
  <div class="bia1">
  <img src="https://scontent.fsgn2-7.fna.fbcdn.net/v/t39.30808-6/344344333_183240687944006_4719060222219809450_n.jpg?stp=dst-jpg_p600x600&_nc_cat=100&ccb=1-7&_nc_sid=783fdb&_nc_ohc=65buc9zae2QAX_mw4kV&_nc_ht=scontent.fsgn2-7.fna&oh=00_AfB2o_svUWa6w3fjt431f4WJ32AN0i_QFqthUEVTssLWJA&oe=659D08D7" style="width:100%; height:100%;border-radius:5px">
  </div>
  <div class="khungcanhan">
    <div class="canhan1">
      <div class="anhdaidien">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2GI8ap-iuztWSsPmzlfnbcG4AHTEodf0wVkoGorRjQoW5pIT3" style="width:100%; height:100%; border-radius: 50%;">
      </div>
    </div>
    <div class="name">
      <div><strong>M-TP</strong></div>
      <div class="banbe"><br>2939 bạn bè </div>
      <div class="tieusu"><br> tiểu sử nek rh bebebe he hihi heieiw heu rudud </div>
    </div>
    <div class="congcu">
      <button  class="congcu1">Nhắn tin</button>
      <button  class="congcu1">Kết bạn</button>
    </div>

  </div>
</div>
<div class="story">
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
</div>
</div>