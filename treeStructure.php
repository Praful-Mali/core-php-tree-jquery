<!DOCTYPE html>
<html>
 <head>
  <title>View Tree Structer</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  
  <style>
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">View Tree Structer</h2>
   <br /><br />
   <div id="treeview"></div>
   
   <a id="" href="index.php" name="view" class="btn btn-primary">Add Category</a>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $.ajax({ 
   url: "get_tree_categories.php",
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
	  
		var dataArray = [];
		for (var key in data) {
			if (data.hasOwnProperty(key)) {
				dataArray.push(data[key]);
			}
		};

		$('#treeview').treeview({
			data: dataArray,
			levels :2,
			tags: 5
		});
   }   
 });
 
 
 
});



</script>