<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
<link href="css/font-awesome.min.css" rel="stylesheet"/>
</head>
<style>

body {
	background-image: url(https://coronapoolrepair.com/wp-content/uploads/2021/06/wesley-tingey-OxOmKMwJfBo-unsplash.jpg);
}
.container {
	display: flex;
	align-items: center;
	justify-content: center;
    margin-top: 70px;
	padding-bottom: 5%;
}
.khung_ngoai {		
	background:linear-gradient(white,rgb(193, 233, 244)); 	
	position: relative;	
	height: 790px;
	width: 400px;	
	box-shadow: 0px 0px 24px rgb(35, 95, 112);
    border-radius:45px
}
.login {
	width: 320px;
	padding: 40px;
	padding-top: 156px;
}
.icon {
	position: absolute;
	top: 25px;
	color:  rgb(35, 95, 112);
    font-size:22px
}
.khung_dangnhap {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 15px;
	padding-left: 24px;
	font-weight: 600;
	width: 95%;
    font-size:15px;
    top:10px
}
.khung_dangnhap:focus,
.khung_dangnhap:hover {
	outline: none;
	border-bottom-color: #6A679E;
}
.button_dangnhap {
	background: white;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 0.5px solid rgb(35, 95, 112);
	font-weight: 700;
	width: 95%;
	color: rgb(37, 105, 132);
	box-shadow: 0px 2px 2px rgb(35, 95, 112);
	cursor: pointer;	
}
.button_dangnhap:active {
    background-color:rgb(193, 233, 244)}
.button_dangnhap:hover {
	border-color: white;
	outline: none;
}
</style>
<div class="container">
    <div style="font-family:Garamond; font-size:50px;margin-top:-100px">LOTUS HOTEL</div>
    <div style="font-size:40px;font-style: italic;padding: 20px">Rất hân hạnh khi được phục vụ bạn</div>
	<div class="khung_ngoai">
		<form action="ctrl_logup.php" method="post" class="login">
			
			<div style="padding: 20px 0px;position: relative">
				<i class="icon fa fa-user "> </i>
				<input type="text" class="khung_dangnhap" placeholder="Họ tên" name="hoten" required>
			</div>
			<div style="padding: 20px 0px;position: relative">
				<i class="icon fa fa-user "> </i>
				<input type="text" class="khung_dangnhap" placeholder="Email" name="email" required>
			</div>
			<div style="padding: 20px 0px;position: relative">
				<i class="icon fa fa-user "> </i>
				<input type="text" class="khung_dangnhap" placeholder="Số điện thoại" name="sdt" required>
			</div>
			<div style="padding: 20px 0px;position: relative">
				<i class="icon fa fa-user "> </i>
				<input type="text" class="khung_dangnhap" placeholder="Căn cước công dân" name="cccd" required>
			</div>
			<div style="padding: 20px 0px;position: relative;">
				<i class="icon fa fa-key "></i>
				<input type="password" class="khung_dangnhap" placeholder="Password"  name="pass" required>
			</div>
			<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
			</label>
			<input type="submit" value="SIGN UP" class="button_dangnhap" name="dangnhap">
			<div style="font-size:20px;margin-top:10px;margin-left:40px ">
				<a href="login.php" style="margin-left: 110px;"> Sign in </a>
      		</div>
		</form>
	</div>
</div>


