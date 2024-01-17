<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/like.css">
	<link rel="stylesheet" href="css/main.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="like.js"></script>
</head>
<!-- sidebar -->
<div class="header" style="height: 200px; width: 100%; background-color: brown;">
	header
</div>
<div class="left" style=" width: 20%; background-color: blue; height: 80vh">
	left
</div>
<div class="post_TCN" style="padding-left: 50px;">
	<div class="central-meta" style="padding:0px; padding-top: 5px; padding-left: 5px;">
		<ul class="photos">
			<!-- P1 -->
			<li>
				<div class="container" style="padding: 3px;">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_1"
						style="padding: 0px; border: 0px;width: 45vh;height: 45vh;">
						<img src="img/Screenshot 2023-11-21 093925.png" alt="" style="width: 45vh;height: 45vh;">
					</button>

					<!-- The Modal -->
					<div class="modal fade" id="myModal_1">
						<div class="modal-dialog modal-xl" style="margin-left: 150px;">
							<div class="modal-content" style="width: 90%; height: 80%;">
								<!-- Modal body -->
								<div class="modal-body" style="padding: 0px;">
									<?php
									$i = 1;
									include 'picture.php'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<!-- p2 -->
			<li>
				<div class="container" style="padding: 3px;">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_2"
						style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
						<img src="img/Screenshot 2023-12-21 204909.png" alt="" style="width: 45vh;height: 45vh;">
					</button>
					<!-- The Modal -->
					<div class="modal fade" id="myModal_2">
						<div class="modal-dialog modal-xl" style="margin-left: 150px;">
							<div class="modal-content" style="width: 90%; height: 80%;">
								<!-- Modal body -->
								<div class="modal-body" style="padding: 0px;">
									<?php
									$i = 2;
									include 'picture.php'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<!-- p3 -->
			<li>
				<div class="container" style="padding: 3px;">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_3"
						style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
						<img src="img/Screenshot 2024-01-06 215212.png" alt="" style="width: 45vh;height: 45vh;">
					</button>
					<!-- The Modal -->
					<div class="modal fade" id="myModal_3">
						<div class="modal-dialog modal-xl" style="margin-left: 150px;">
							<div class="modal-content" style="width: 90%; height: 80%;">
								<!-- Modal body -->
								<div class="modal-body" style="padding: 0px;">
									<?php
									$i = 3;
									include 'picture.php'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<!-- p4 -->
			<li>
				<div class="container" style="padding: 3px;">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_4"
						style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
						<img src="img/Screenshot 2023-12-07 233249.png" alt="" style="width: 45vh;height: 45vh;">
					</button>
					<!-- The Modal -->
					<div class="modal fade" id="myModal_4">
						<div class="modal-dialog modal-xl" style="margin-left: 150px;">
							<div class="modal-content" style="width: 90%; height: 80%;">
								<!-- Modal body -->
								<div class="modal-body" style="padding: 0px;">
									<?php
									$i = 4;
									include 'picture.php'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div><!-- photos -->
</div><!-- centerl meta -->