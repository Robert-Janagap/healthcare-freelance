<?php
	$id = $_GET['id'];

	$querypersonal_info = mysql_query(" SELECT * FROM personal_user, personal_info WHERE user_id='$id' AND puser_id='$id' ")or die(mysql_error());

    $row = mysql_fetch_array($querypersonal_info);

    $fname = $row['fname'];
    $lname = $row['lname'];
    $add = $row['address'];
    $city = $row['city'];
    $con_num = $row['con_num'];

echo '
	<div class="banner">
		<img src="img/therapist_default_img.jpg" alt="" class="banner_img">
		<div class="container">
			<img src="img/ava-w.png" alt="" class="banner_avatar">
		</div>
		<div class="edit_file">
			<input type="file" name="file" id="file" class="inputfile" />
			<label for="file">Choose a Image</label>
		</div>
	</div>
	<div class="container">
		<div class="box_section">
			<h3 class="box_section_title">Personal Information</h3>
			<form action="inc/process.php?action=information" method="POST" enctype="multipart/form-data">
				<div class="box_section_content">
					<div class="input_group">
						<label for="">Name</label>
						<input type="text" name="user_id" value="'.$id.'" hidden>
						<input type="text" value="'.$fname.' '.$lname.'">
					</div>
					<div class="input_group">
						<label for="">Profile Picture</label>
						<input id= "" type="file" name="file">
					</div>
					<div class="input_group">
						<label for="">Job</label>
						<select name="job" id="">
							<option value="Nursing">Nursing</option>
							<option value="Occupational Therapist">Occupational Therapist</option>
							<option value="Physical Therapist">Physical Therapist</option>
						</select>
					</div>
					<div class="input_group">
						<label for="">Address</label>
						<input type="text" name="address" placeholder="House #, Street, Brgy. " value="'.$add.'">
					</div>
					<div class="input_group">
						<label for="">City</label>
						<input type="text" name="city" value="'.$city.'">
					</div>
					<div class="input_group">
						<label for="">Contact number</label>
						<input type="number" name="num" value="'.$con_num.'">
					</div>
				</div>
			</div>
			<div class="box_section">
				<h3 class="box_section_title">Summary</h3>
				<div class="box_section_content">
					<textarea name="summary" id="" cols="30" rows="10" value=""></textarea>
				</div>
			</div>
			<div class="box_section">
				<h3 class="box_section_title">Work History</h3>
				<div class="box_section_content">
					<div class="input_group">
						<div class="group">
							<label for="">Work</label>
							<input type="text" name="work" >
						</div>
					</div>
					<div class="input_group">
						<label for="">Start</label>
						<select name="start" id="year_list">
						</select>
					</div>
					<div class="input_group">
						<label for="">to</label>
						<select name="end" id="year_list">
							<option value="Present">Present</option>
						</select>
					</div>
				</div>
			</div>
			<div class="box_section">
				<h3 class="box_section_title">School Background</h3>
				<div class="box_section_row">
					<div class="input_group">
						<label for="">School</label>
						<input type="text" name="school">
					</div>
					<div class="input_group">
						<label for="">Course</label>
						<input type="text" name="course">
					</div>
					<div class="input_group">
						<label for="">License</label>
						<input type="number" name="license">
					</div>
				</div>
			</div>
				<button type="submit" name="submit" class="btn btn_primary">Save Information</button>
		<form>
	</div>';
?>