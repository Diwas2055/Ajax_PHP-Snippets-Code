$(document).ready(function(){
	var _autosave;
	$('#save').on('click', function(){
		clearInterval(_autosave);
		var title = $('#title').val();
		var content = $('#content').val();
		var blog_id = $('#blog_id').val();
 
			if(title != "" && content != ""){
				$.ajax({
				url: 'save_blog.php',
				type: 'POST',
				data: {title: title, content: content, blog_id: blog_id},
				success: function(){
					$('#title').val('');
					$('#content').val('');
					$('#blog_id').val('');
					$('#result').html("<center>Post Submitted!</center>")
					AutoSave();
				}
			});
		}
	});
 
	function AutoSave(){
		_autosave = setInterval(function(){
			var title = $('#title').val();
			var content = $('#content').val();
			var blog_id = $('#blog_id').val();
	 
				if(title != "" && content != ""){
					$.ajax({
					url: 'update_blog.php',
					type: 'POST',
					data: {title: title, content: content, blog_id: blog_id},
					success: function(data){
						if(data != ""){
							$('#blog_id').val(data);
						}
					}
				});
			}
		}, 2000);
	}
	AutoSave();
 
});