<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
  *	Controller for the admin view
  * 
  */

class Admin extends MY_Controller {
	function __construct() {
        parent::__construct();
        
        $this->load->model('ProjectModel');
        $this->load->model('ProfileModel');
        
        if(!$this->ion_auth->logged_in()) {
        	exit('Ah ah ah, you didn\'t say the magic work...');
        }
    }

	public function index() {	
		if($this->ProfileModel->isAdmin() == 1) {
			// If logged in with the relevant role show the admin for their projects
			$data['analytics'] = $this->load->view('analytics', NULL, TRUE);
			$data['projects'] = $this->ProjectModel->adminProjects();
			
			$this->load->view('admin', $data);
		} else {
			// Else show the access denied
			exit('Ah ah ah, you didn\'t say the magic work...');
		}
	}
	
	function exportdata() {
		if($this->ProfileModel->isAdmin() == 1) {
			// Get the project id
			$project_id = $this->uri->segment(3);
			
			$sql = '
				SELECT DISTINCT(d.image_id), i.filename, d.genus, d.species, d.age, d.country, d.place, d.collector, i.image_url
				FROM project_'.$project_id.'_images AS i
				INNER JOIN project_'.$project_id.'_data AS d
				ON i.image_id = d.image_id	
				ORDER BY d.image_id DESC
			';
			
			$query = $this->db->query($sql);
			
			// Get the data and return
			$output = fopen("php://output",'w') or die("Can't open php://output");
			header("Content-Type:application/csv"); 
			header("Content-Disposition:attachment;filename=project".$project_id.".csv"); 
			
			fputcsv($output, array('Image ID', 'Filename', 'Genus', 'Species', 'Age', 'Country', 'Place', 'Collector', 'URL'));
			
			foreach($query->result() as $row) {
				fputcsv($output, (array)$row);
			}
			
			fclose($output) or die("Can't close php://output");
			
		} else {
			// Else show the access denied
			exit('Ah ah ah, you didn\'t say the magic work...');
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */