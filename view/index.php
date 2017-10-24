<!DOCTYPE html>
<html>
<head>
	<title>Simple MVC Example</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<!-- The View displays the web page using HTML5 and CSS/W3.CSS, etc -->
<div class="w3-container">

  <h2 w3-red>Simple MVC Demo</h2>
  <!-- check hello_controller.php and you will see that it
  uses the data from this form to search the database -->
  <h3>Pick a query to run</h3>
  <form name="choice_form" method="POST">
	<select name="qry">
	    <option value="home">Select</option>
		<option value="hello">Query 1</option>
		<option value="again">Query 2</option>
		<input type="submit" value="Search">
	</select>
  </form>

  <?php include_once("../controller/hello_controller.php");?>
 
</div>
</body>
</html> 
