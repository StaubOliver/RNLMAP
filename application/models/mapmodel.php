<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
  *	Model for the map API
  *  
  */
  
class MapModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    // function to geocode address, it will return false if unable to geocode address
    function geocode($address){
     
        // url encode the address
        $address = urlencode($address);
         
        // google map geocode api url
        $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
     
        // get the json response
        $resp_json = file_get_contents($url);
         
        // decode the json
        $resp = json_decode($resp_json, true);
     
        // response status will be 'OK', if able to geocode given address 
        if($resp['status']=='OK'){
     
            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];
             
            // verify if data is complete
            if($lati && $longi && $formatted_address){
             
                // put the data in the array
                $data_arr = array();            
                 
                array_push(
                    $data_arr, 
                        $lati, 
                        $longi, 
                        $formatted_address
                    );
                 
                return $data_arr;
                 
            }else{
                return false;
            }
             
        }else{
            return false;
        }
    }

    /**
    *   Load all fossils given the informations of genus, species, age and collector form every project
    */
    function loadFossils($data){

    	//using the data from the filter we create the where statement for querying the database
   /* 	$where = [];
    	$i = 0;
    	
    	if ($data['genus'] != "-1"){
    		$where[$i] = "genus = " . $data['genus'];
			$i += 1;
    	}

    	if ($data['species'] != "-1"){
    		$where[$i] = "species = " . $data['species'];
    		$i += 1;
    	}

    	/*$where[$i] = "age_min = " . $data['age_min'];
        $i += 1;

        $where[$i] = "age_max = " . $data['age_max'];
        $i += 1;
        */

    /*	if ($data['collector'] != "-1"){
    		$where[$i] = "colletor = " . $data['collector'];
    		$i += 1;
    	}

        $where_string = "";

    	for ($j=0; $j<$i-1; $j++)
    	{
			$where_string .= $where[$j] . " AND ";
    	}
    	
        $where_string = $where_string . $where[$i];
*/
    	//Now we look the projects_master table to give us the data_table foreach project
    	$query = $this->db->query('SELECT id, name, image, blurb, data_table, image_table FROM projects_master');

    	$return = [];
        
    	if($query->num_rows() > 0) {
    		foreach($query->result_array() as $row)
    		{
    			//we retrieve the data from each fossil from each project
    			$query2 = $this->db->query('SELECT data_id, image_id, genus, species, age, country, place, collector FROM ' . $row["data_table"]/*.' WHERE '.$where_string*/);

                //return $query2->result_array(); 
    
				//if($query2->num_rows>0){
			    //$return[] = $query2->result_array();
				//}

                foreach ($query2->result_array() as $row)
                {
                    $temp = $this->geocode($row['country'].' '.$row['place']);
                    return $temp;

                }
    			
    		}
            //return the data
            return $return;
    	}
        
        

    }


    function loadFeedbacks($filter){
    	//using the data from the filter we create the where statement for querying the database
    	$where = [];
    	$i = 0;
    	
    	if ($data['genus'] != "-1"){
    		$where[$i] = "genus = " . $data['genus'];
			$i += 1;
    	}

    	if ($data['species'] != "-1"){
    		$where[$i] = "species = " . $data['species'];
    		$i += 1;
    	}

		$where[$i] = "age_min = " . $data['age_min'];
		$i += 1;

        $where[$i] = "age_max = " . $data['age_max'];
        $i += 1;
        

    	if ($data['collector'] != "-1"){
    		$where[$i] = "colletor = " . $data['collector'];
    		$i += 1;
    	}

    	$where_string = "";

    	for ($j=0; $j<$i-1; $j++)
    	{
			$where_string .= $where[$j] . " AND ";
    	}
    	$where_string .= $where[$i];

    	//querying the database to find the filter id
    	$query = $this->db->query('SELECT filter_id FROM filter WHERE '.$where_string);

    	if ($query->num_rows() > 0)
    	{
    		//if the filter is found we use it to retrieve the feedabcks
    		$row = $query->row_array();
    		$filter_id = $row['filter_id'];

    		$query = $this->db->query('SELECT feedback_id, user_id, time, message FROM feedback WHERE filter_id='.$filter_id);

    		if ($query->num_rows > 0)
    		{
    			//we found some feedbacks related to that filter
    			return $query->result_array();
    		} else {
    			//if we didn't we return an empty array
    			return array();
    		}
    	} else {
    		//if the filter is not found then no feedbacks are recorded. We return an emty array
    		return array();
    	}
    }

    function loadGenuses(){

        $query = $this->db->query('SELECT id, name, image, blurb, data_table, image_table FROM projects_master');

        $return = [];

        if($query->num_rows() >0) {
            foreach($query->result_array() as $row)
            {
                //we retrieve the data from each fossil from each project
                $query2=$this->db->query('SELECT disctinct data_id, image_id, genus, species, age, country, place, collector FROM '.$row['data_table'].' WHERE '.$where_string);

                if($query2->num_rows>0){
                    array_merge($return, $query2->result_array());
                }
                
            }

            //return the data
            return $return;
        }
    }

    /*function submitFeedback($data, $filter){
    	//the data contains the time, message and user id information.
    	//we need to find the filter associated with it. 
    	//if such a filter does not exist we need to create it



    }*/


}