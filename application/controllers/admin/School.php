<?php defined('BASEPATH') OR exit('No direct script access allowed');
class School extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/School_model', 'School_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Schools List';
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$school_district_id	= $this->input->get('school_district_id');
			$data['school_district_id'] = (isset($school_district_id) && $school_district_id != "")?$school_district_id:0;

			$school_tehsil_id = $this->input->get('school_tehsil_id');
			$data['school_tehsil_id'] = (isset($school_tehsil_id) && $school_tehsil_id != "")?$school_tehsil_id:0;

			$school_type = $this->input->get('school_type');
			$data['school_type'] = (isset($school_type) && $school_type != "")?$school_type:'';

			$school_gender = $this->input->get('school_gender');
			$data['school_gender'] = (isset($school_gender) && $school_gender != "")?$school_gender:'';
   
		} else if ($this->input->server('REQUEST_METHOD') === 'POST'){
   			$school_district_id	= $this->input->post('school_district_id');
			$data['school_district_id'] = (isset($school_district_id) && $school_district_id != "")?$school_district_id:0;

			$school_tehsil_id = $this->input->post('school_tehsil_id');
			$data['school_tehsil_id'] = (isset($school_tehsil_id) && $school_tehsil_id != "")?$school_tehsil_id:0;

			$school_type = $this->input->post('school_type');
			$data['school_type'] = (isset($school_type) && $school_type != "")?$school_type:'';

			$school_gender = $this->input->post('school_gender');
			$data['school_gender'] = (isset($school_gender) && $school_gender != "")?$school_gender:'';
		}
		else {
   			$school_district_id	= $this->input->post('school_district_id');
			$data['school_district_id'] = (isset($school_district_id) && $school_district_id != "")?$school_district_id:0;

			$school_tehsil_id = $this->input->post('school_tehsil_id');
			$data['school_tehsil_id'] = (isset($school_tehsil_id) && $school_tehsil_id != "")?$school_tehsil_id:0;

			$school_type = $this->input->post('school_type');
			$data['school_type'] = (isset($school_type) && $school_type != "")?$school_type:'';

			$school_gender = $this->input->post('school_gender');
			$data['school_gender'] = (isset($school_gender) && $school_gender != "")?$school_gender:'';
		}
		
			
		$data['districts'] = $this->School_model->get_all_districts();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/school/school_list');
		$this->load->view('admin/includes/_footer');
	}
	public function schools_report()
	{
		$data['title'] = 'Schools Statistics Report';
		$this->load->view('admin/includes/_header', $data);
		if($this->session->userdata('role_id') == 7){
			$data['dfp_schools'] = $this->School_model->get_school_for_dfp();
			$this->load->view('admin/school/school_stats_report', $data);
		}
		if($this->session->userdata('role_id') == 8){
			$data['tfp_schools'] = $this->School_model->get_school_for_tfp();
			$this->load->view('admin/school/school_stats_report_tfp', $data);
		}
		if($this->session->userdata('role_id') == 1){
			$data['dfp_schools'] = $this->School_model->get_school_for_admin();
			$this->load->view('admin/school/school_stats_report_admin', $data);
		}
		//$this->load->view('admin/school/school_stats_report');
		$this->load->view('admin/includes/_footer');
	}
	
	/*
	public function subjects_by_grade()
	{
		echo json_encode($this->slos_model->get_subjects_by_grade($this->input->post('grade_id')));				
	}
	public function cstands_by_subject()
	{
		echo json_encode($this->slos_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	public function subcstands_by_cstand()
	{
		echo json_encode($this->slos_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
	*/
	public function datatable_json(){	
		$school_district_id = $this->input->get('school_district_id');
		$school_tehsil_id 	= $this->input->get('school_tehsil_id');
		$school_type 		= $this->input->get('school_type');
		$school_gender 		= $this->input->get('school_gender');
		
		$records = $this->School_model->get_all_schools($school_district_id, $school_tehsil_id, $school_type, $school_gender);
 /* echo '<pre>';
		print_r($records);
		die();*/ 
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{
			$deleteschoolflag = '';
			if($this->session->userdata('role_id') == 1){
				$deleteschoolflag = '<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/school/delete/".$row['school_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
			}
			$status = ($row['school_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['username'],
				//$row['school_department'],
				$row['school_type'],
				$row['school_name'],
				$row['school_address'],
				$row['district_name_en'],
				$row['tehsil_name_en'],
				//$row['school_level'],
				$row['school_gender'],
				//$row['school_email'],
				//$row['school_phone'],
				
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['school_id'].'" 
				id="cb_'.$row['school_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['school_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" target="_blank" href="'.base_url('admin/school/school_view/'.$row['school_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/school/edit/'.$row['school_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				'.$deleteschoolflag
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->School_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('username', 'EMIS Code/Login Name', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('school_department', 'School Department', 'trim|required');
			$this->form_validation->set_rules('school_type', 'School Type', 'trim|required');
			$this->form_validation->set_rules('school_name', 'School Name', 'trim|required');
			$this->form_validation->set_rules('school_address', 'School Address (URDU)', 'trim');
			if($this->session->userdata('role_id') != 7){
			$this->form_validation->set_rules('school_district_id', 'District', 'trim|required');
			}
			$this->form_validation->set_rules('school_tehsil_id', 'Tehsil', 'trim');
			$this->form_validation->set_rules('school_level', 'School Level', 'trim|required');
			$this->form_validation->set_rules('school_gender', 'School Geneder', 'trim|required');
			$this->form_validation->set_rules('school_email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('school_phone', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('school_location', 'School Location', 'trim|required');
			$this->form_validation->set_rules('school_status', 'Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/school/add'),'refresh');
			}
			else{
				$data = array(					
					'username' => $this->input->post('username'),
					'password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
					'school_department' => $this->input->post('school_department'),
					'school_type' =>$this->input->post('school_type'),
					'school_name' => $this->input->post('school_name'),
					'school_address' => $this->input->post('school_address'),
					//'school_district_id' => $this->input->post('school_district_id'),	
					'school_tehsil_id' => $this->input->post('school_tehsil_id'),	
					'school_level' =>$this->input->post('school_level'),
					'school_gender' =>$this->input->post('school_gender'),
					'school_email' => $this->input->post('school_email'),
					'school_phone' => $this->input->post('school_phone'),
					'school_location' => $this->input->post('school_location'),
					'school_contact_name' => $this->input->post('school_contact_name'),
					'school_contact_mobile' => $this->input->post('school_contact_mobile'),
					'school_status' => $this->input->post('school_status'),	
					'school_createdby' =>$this->session->userdata('admin_id'),
					'school_last_ip' =>$this->input->post('192.168.1.121'),
					'school_last_login' =>$this->input->post('school_last_login')
				);
				if($this->session->userdata('role_id') == 7){
					$data['school_district_id'] = $this->session->userdata('u_district_id');
				}else{
					$data['school_district_id'] = $this->input->post('school_district_id');
				}
				$data = $this->security->xss_clean($data);
				//print_r($data);
				//die();
				$result = $this->School_model->add_school($data);
				if($result){
					$this->session->set_flashdata('success', 'School has been added successfully!');
					redirect(base_url('admin/school'));
				}
			}
		}
		else{
			$data['title'] = 'Add School';
			$data['districts'] = $this->School_model->get_all_districts();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/school/school_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		//echo '<PRE>';
		//print_r($_REQUEST);
		//die('Request----------------------------');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'EMIS Code/Login Name', 'trim|required');
			//$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('school_department', 'School Department', 'trim|required');
			$this->form_validation->set_rules('school_type', 'School Type', 'trim|required');
			$this->form_validation->set_rules('school_name', 'School Name', 'trim|required');
			$this->form_validation->set_rules('school_address', 'School Address (URDU)', 'trim');
			//$this->form_validation->set_rules('school_district_id', 'District', 'trim|required');
			//$this->form_validation->set_rules('school_tehsil_id', 'Tehsil', 'trim');
			$this->form_validation->set_rules('school_level', 'School Level', 'trim|required');
			$this->form_validation->set_rules('school_gender', 'School Geneder', 'trim|required');
			$this->form_validation->set_rules('school_email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('school_phone', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('school_location', 'School Location', 'trim|required');
			$this->form_validation->set_rules('school_status', 'Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				//die('------------------------Request Validation False--------------------------');
				$data['school'] = $this->School_model->get_school_by_id($id);
				$data['view'] = 'admin/school/school_edit';
				$this->load->view('layout', $data);
			}
			else{
				//die('------------------------Request Validation True--------------------------');				
				
				$data = array(	
						'username' => $this->input->post('username'),						
						'school_department' => $this->input->post('school_department'),
						'school_type' =>$this->input->post('school_type'),
						'school_name' => $this->input->post('school_name'),
						'school_address' => $this->input->post('school_address'),
						//'school_district_id' => $this->input->post('school_district_id'),	
						//'school_tehsil_id' => $this->input->post('school_tehsil_id'),	
						'school_level' =>$this->input->post('school_level'),
						'school_gender' =>$this->input->post('school_gender'),
						'school_email' => $this->input->post('school_email'),
						'school_phone' => $this->input->post('school_phone'),
						'school_location' => $this->input->post('school_location'),
						'school_contact_name' => $this->input->post('school_contact_name'),
						'school_contact_mobile' => $this->input->post('school_contact_mobile'),
						'school_status' => $this->input->post('school_status'),	
					);					
					
				if($this->input->post('password')!='')
				{	
					$data['password'] = password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT );					
				}
				
				if($this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8){
					
				}
				else{
					$data['school_district_id'] = $this->input->post('school_district_id');
				}
				
				if($this->session->userdata('role_id') == 8){
					
				}
				else{
					$data['school_tehsil_id'] = $this->input->post('school_tehsil_id');
				}
				
				$data = $this->security->xss_clean($data);
				$result = $this->School_model->edit_school($data, $id);
				//print_r($result);
				//die();
				if($result){
					$this->session->set_flashdata('success', 'School has been updated successfully!');
					redirect(base_url('admin/school'));
				}
			}
		}
		else{
			$data['title'] = 'Edit School';
			$data['districts'] = $this->School_model->get_all_districts();
			$data['tehsils'] = $this->School_model->get_all_tehsils();
			$data['school'] = $this->School_model->get_school_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/school/school_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		//$this->db->delete('ci_schools', array('school_id' => $id));
		//$this->session->set_flashdata('success', 'School has been deleted successfully!');
		$this->session->set_flashdata('error', 'You do not permission to delete the school!');
		redirect(base_url('admin/school'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_school_pdf(){
		ini_set("pcre.backtrack_limit", "5000000");
		$school_district_id = $this->input->get('school_district_id');
		$school_tehsil_id 	= $this->input->get('school_tehsil_id');
		$school_type 		= $this->input->get('school_type');
		$school_gender 		= $this->input->get('school_gender');
		
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_school'] = $this->School_model->get_school_for_export($school_district_id, $school_tehsil_id, $school_type, $school_gender);
		$this->load->view('admin/school/school_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_school_csv(){ 
		$school_district_id = $this->input->get('school_district_id');
		$school_tehsil_id 	= $this->input->get('school_tehsil_id');
		$school_type 		= $this->input->get('school_type');
		$school_gender 		= $this->input->get('school_gender');
	   // file name 
		$filename = 'school_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv;");
	   // get data 
		$school_data = $this->School_model->get_school_csv_export($school_district_id, $school_tehsil_id, $school_type, $school_gender);
		// file creation 
		$file = fopen('php://output', 'w');
		$header = array("ID", "EMIS Code/Login Name", "Department/Body", "School Type", "School Name", "School Address", "District", "Tehsil", "School Level", "School Gender", "School Email", "Phone Number","Contact Name", "Contact Mobile", "Location", "Status"); 
		fputcsv($file, $header);
		foreach ($school_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	public function tehsil_by_district()
	{
		echo json_encode($this->School_model->get_tehsil_by_district($this->input->post('district_id')));
	}
	public function school_view($id = 0)
	{
		$data['title'] = 'View School Details';
		
		$data['school'] = $this->School_model->get_school_info_by_id($id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/school/school_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->School_model->username_exist( $username );
		echo count( $exists );
	}
	/////////////////////////////////////////////////////////////////
	public function mcq_erq_sch_dtl($id)
	{
		$data['title'] = 'Schools Statistics Report';
		$data['schools'] = $this->School_model->get_schools_by_tehsil($id);
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/school/schools_by_tehsil_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
}
?>