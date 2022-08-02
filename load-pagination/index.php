<?php 
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Load PostgreSQL Data on  Page scroll Using  jQuery  AJAX  PHP</title>
	<style type="text/css">
		.container{
		  width: 55%;
		  margin: 0 auto;
		  border: 0px solid black;
		  padding: 10px 0px;
		}

		/* post */.post{
		  width: 97%;
		  min-height: 200px;
		  padding: 5px;
		  border: 1px solid gray;
		  margin-bottom: 15px;
		}

		.post h2{
		  letter-spacing: 1px;
		  font-weight: normal;
		  font-family: sans-serif;
		}


		.post p{
		  letter-spacing: 1px;
		  text-overflow: ellipsis;
		  line-height: 25px;
		}

		/* more link */.more{
		  color: blue;
		  text-decoration: none;
		  letter-spacing: 1px;
		  font-size: 16px;
		}

	</style>
</head>
<body>

	<div class="container">

	<?php

	 // Row per page
	 $rowperpage = 3;

	 // counting total number of posts
	 $sql = "select count(*) as allcount from posts";
		$result = pg_query($con,$sql);
		$records = pg_fetch_assoc($result);
		$allcount = $records['allcount'];
	
	 // select first 3 posts
	 $sql = "select * from posts order by id asc limit 0 OFFSET $row";

	$records = pg_query_params($con,$sql);

	 while ($row = pg_fetch_assoc($records)) {

	   $id = $row['id'];
	   $title = $row['title'];
	   $content = $row['description'];
	   $shortcontent = substr($content, 0, 160)."...";
	   $link = $row['link'];
	 ?>

	   <div class="post" id="post_<?php echo $id; ?>">
	     <h2><?php echo $title; ?></h2>
	     <p>
	       <?php echo $shortcontent; ?>
	     </p>
	     <a href="<?= $link ?>" target="_blank" class="more">More</a>
	   </div>

	 <?php
	 }
	 ?>

	  <input type="hidden" id="start" value="0">
	  <input type="hidden" id="rowperpage" value="<?= $rowperpage ?>">
	  <input type="hidden" id="totalrecords" value="<?= $allcount ?>">

	</div>

	<!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
	checkWindowSize();

	// Check if the page has enough content or not. If not then fetch records
	function checkWindowSize(){
	   if($(window).height() >= $(document).height()){
	      // Fetch records
	      fetchData();
	   }
	}

	// Fetch records
	function fetchData(){
	   var start = Number($('#start').val());
	   var allcount = Number($('#totalrecords').val());
	   var rowperpage = Number($('#rowperpage').val());
	   start = start + rowperpage;

	   if(start <= allcount){
	      $('#start').val(start);

	      $.ajax({
	         url:"ajaxfile.php",
	         type: 'post',
	         data: {start:start,rowperpage: rowperpage},
	         success: function(response){

	            // Add
	            $(".post:last").after(response).show().fadeIn("slow");

	            // Check if the page has enough content or not. If not then fetch records
	            checkWindowSize();
	         }
	      });
	   }
	}

	$(document).on('touchmove', onScroll); // for mobile

	function onScroll(){

	   if($(window).scrollTop() > $(document).height() - $(window).height()-100) {
	      fetchData(); 
	   }
	}

	$(window).scroll(function(){

	   var position = $(window).scrollTop();
	   var bottom = $(document).height() - $(window).height();

	   if( position == bottom ){
	      fetchData(); 
	   }

	});
	</script>
</body>
</html>