<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Auto Save Data Using jQuery</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="POST">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" id="title"/>
					<input type="hidden" id="blog_id"/>
				</div>
				<div class="form-group">
					<label>Content</label>
					<textarea id="content" class="form-control" style="resize:none; height:200px;"></textarea>
				</div>
				<div id="result"></div>
				<br />
				<center><button type="button" id="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save Post</button></center>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/script.js">
</script>
</html>