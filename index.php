<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLAGIARISM DETECTOR</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
<style type="text/css">
	body {
	font-family:cursive;
	margin:100px;
	}
</style>

  </head>
  <body>
 
  <h1 style="text-align:center; color:blue;">PLAGIARISM TEST</h1>
  <section class="container" style="margin-top:50px;">
  <div class="msg" align="center"></div>
  <form method="post" id="form_submit">
  <input type="hidden" name="detect" value="duo">
  	<div class="row">
    	<div class="form-group col-sm-12">    
            <label>Paste Text (Max:255 characters)</label>
            <textarea class="form-control" style="resize:none; height:250px;" name="text1" required></textarea>    
        </div>
        
        <div class="form-group">
            <button type="submit" style="float:right; margin-right:20px; border-radius:0;" class="btn btn-primary">Test for Plagiarism</button>
		<div style="clear:both;"></div>
        </div>
        
    </div>
    </form>
  </section>
  

    <script src="jquery-1.11.3-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
	<script>
	jQuery().ready(function(){
		$("form#form_submit").on('submit',(function(e){
			e.preventDefault();
$("div.msg").html("<p style='text-align:center; color:#ffc300; font-size:20px;'>Analyzing...</p>");
				$.ajax({
						type: "POST",
                        url: "exe.php",
                        data: new FormData(this),
						contentType:false,
						processData:false,
                        cache: false,
                        success: function(data){ 
						$("div.msg").html(data);
						}
				});
			
		}));
	});
	</script>
	
  </body>
</html>