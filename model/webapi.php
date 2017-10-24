<?php
   header("Content-Type:application/json");
   // get data from the URL sent by controller
   // assign to variable
   $qry = filter_input(INPUT_GET, 'qry');
   $status = filter_input(INPUT_GET, 'status');
   // if qry= hello...
   include_once("../model_db/db.php");
   $model = new model_db();
   if (!empty($qry))
   {
	   if ($qry == "hello")
			$data = $model->get_data(1);
	   else if ($qry == "again")
			$data = $model->get_data(2);
		
	   // decide whether to sent not found or the data
	   if (empty($data))
			deliver_response(200, "data not found", NULL);
	   else
		   deliver_response(200, "data found", $data);
   }
   else
   {
	   // send error message to client
	   deliver_response(400, "Invalid request", NULL);
   }

   // send data to controller as JSON - see header of this file
   function deliver_response($status, $status_message, $data)
   {
	  header("HTTP/1.1 $status $status_message");
	  $response['status'] = $status;
	  $response['status_message'] = $status_message;
	  $response['data'] = $data;
	  
	  $json_response = json_encode( $response );
	  echo $json_response;  
   }
?>