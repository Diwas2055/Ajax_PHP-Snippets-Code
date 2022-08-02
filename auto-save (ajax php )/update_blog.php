<?php
	require_once 'conn.php';
 
	if($_POST['blog_id'] == ""){
		$title = $_POST['title'];
		$content = $_POST['content'];
 
		$conn->query("INSERT INTO `blog` VALUE('', '$title', '$content', 'Draft')");
		echo $conn->insert_id;
	}else{
		$title = $_POST['title'];
		$content = $_POST['content'];
		$blog_id = $_POST['blog_id'];
		$conn->query("UPDATE `blog` SET `blog_title` = '$title', `blog_content` = '$content' WHERE `blog_id` = '$blog_id' && `status` = 'Draft'");
	}
?>