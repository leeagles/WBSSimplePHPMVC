<?php 
/* -----------------
Author: E.Eagles
-------------------*/
class model_db
{
    public  $db_msg = "";
    private $db = "";
	protected $result = "";
	private $debug = 0;
	
	/* ----------------------------------------------------------------
    function: __construct()
    Responsible for creating the object
	and connecting to the database using more secure PDO
    creates database handle $db
    ---------------------------------------------------------------- */
	public function __construct()
    {
		/*** mysql hostname ***/
		$hostname = "localhost";
		/*** mysql username ***/
		$username = "root";
		/*** mysql password ***/
		$password = "usbw";
	   
		try 
		{
			$this->db = new PDO("mysql:host=localhost;port=3308;dbname=test_db", $username, $password);
			// stores the outcome of the connection into a class variable
		}
		catch(PDOException $e)
		{
		   $this->db = -1;
		   $this->db_msg = "Could not connect to database: ".$e->getMessage();
		}
	}
	
    // simple private query function.
	private function tbl_query($id)
	{
		$sql = "SELECT dtext from test_table WHERE ID=$id";
		if ($this->debug==1)
			echo "dbapi: $sql";
		// run database query to fetch one item
		try 
		{
			$query = $this->db->prepare( $sql );
			$query->execute();
			$this->result = $query->fetchColumn(); 
		}
		// catch error and deal with it
		catch(PDOException $ex) 
		{
			 $this->db_msg = "An Error occured writing to database: " .$ex->getMessage() ;
		}
		
		return $this->result;
	}

    // public function to return data to web API
	public function get_data($id)
    {
		$this->tbl_query($id);
		return $this->result;	
    }
	
}

// test - uncomment the lines below to
// run this script in the browser.
//-------------------------------------
//$model = new model_db();
//$data = $model->get_data(1);
//echo ("<br />".$data);

