<div class="container">
		<div class="input_search">
			<h3>Look for your healthcare provider</h3>
			<input type="search" id="search_input">
			<div class="input_search_filter">
				<ul>
					<li><span class="search_filter active">All</span></li>
					<li><span class="search_filter">Nursing</span></li>
					<li><span class="search_filter">Occupational Therapy</span></li>
					<li><span class="search_filter">Physical Therapy</span></li>
				</ul>
			</div>
		</div>
		<div class="card_list" id="search_list">
		<?php
		$psersonal = mysql_query("SELECT * FROM personal_user, personal_info WHERE personal_info.puser_id=personal_user.user_id")or die(mysql_error());

		while ($row = mysql_fetch_array($psersonal)) {
			$fname = $row['fname'];
			$lname = $row['lname'];
			$user_id = $row['user_id'];
			$image = $row['image'];

			echo'
				<a href="index.php?page=information&id='.$user_id.'" class="card_tile">
					<div class="img_content">
						<img src="'.$image.'" alt="">
					</div>
					<div class="card_tile_info">
						<div class="card_tile_title">'.$fname.' '.$lname.'</div>
					</div>
				</a>';
			}
		?>
		</div>
	</div>
	