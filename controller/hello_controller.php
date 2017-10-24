<?php	
// as this is a Web API, the route is to a Web address
function get_route($qry)
{
	$host = "http://localhost:8080/";
	// change to the correct path.
	$loc = "Simple/model/webapi.php";
	// SEF URL's would normally be used, not ? and &
	$url = $host."$loc?";
	/*-------------------------------------------------- 
	Connect to web api to collect data 
	Example of where there is a choice:
	---------------------------------------------------*/
	if (!empty($qry) && !empty($status) )
			$url .= "qry=$qry&status=$status";
    
	else if (!empty($qry) )
			// this path will be taken for the demo
			$url .= "qry=$qry";
	return $url;
}

function get_data($url)
{
	$wclient = curl_init($url);
	//echo $url;
	curl_setopt($wclient, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($wclient);
	$result = json_decode($response);
	$data = $result->data;	
	return $data;	
}	
// post data from the HTML form in index.php
$qry = filter_input(INPUT_POST, "qry");
if (empty($qry))
	$qry = "home";
else
{
	$url = get_route($qry);
	$data = get_data($url);
}
// now include view to display the data gathered.
include_once("../view/".$qry."_view.php");

?>