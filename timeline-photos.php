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
<div class="post_TCN">
	<div class="central-meta" style="padding:0px; padding-top: 5px; padding-left: 5px;">
		<ul class="photos">
			<?php while ($row = mysqli_fetch_assoc($data)) { ?>
				<?php if ($row['image'] != '' || $row['camera'] != '') { ?>
					<li>
						<?php if ($row['image'] != '') { ?>
							<div class="container" style="padding: 3px;">
								<!-- Button to Open the Modal -->

								<button type="button" class="btn btn-primary" data-toggle="modal"
									data-target="#myModal_<?php echo $row['p_id']; ?>" style="padding: 0px; border: 0px; ">

									<img src="image/<?php echo $row['image']; ?>" alt="" style="aspect-ratio: 1 / 1;">
								</button>

								<!-- The Modal -->
								<div class="modal fade" id="myModal_<?php echo $row['p_id']; ?>">
									<div class="modal-dialog modal-xl" style="margin-left: 150px;">
										<div class="modal-content" style="width: 135%; height: 80%;">
											<!-- Modal body -->
											<div class="modal-body" style="padding: 0px;">
												<?php include 'picture.php'; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

					</li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div><!-- photos -->
</div><!-- centerl meta -->