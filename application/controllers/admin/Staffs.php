<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Staffs extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/staff_model', 'staff_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){

		$data['title'] = 'Staff List';

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/staffs/staff_list');
		$this->load->view('admin/includes/_footer');
	}
		
	public function datatable_json(){				   					   
		$records = $this->staff_model->get_all_staffs();
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['is_active'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['staffname'],
				$row['email'],
				$row['district_name_en'],
				$row['tehsil_name_en'],
				$row['school_id'],
				$row['type'],
				$row['mobile_no'],
				date_time($row['created_at']),	
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['id'].'" 
				id="cb_'.$row['id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['id'].'"></label>',		

				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/staffs/edit/'.$row['id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/staffs/edit/'.$row['id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/staffs/delete/".$row['id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}

	//-----------------------------------------------------------
	public function change_status(){   

		$this->staff_model->change_status();
	}

	//-----------------------------------------------------------
	public function add(){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('staffname', 'Staffname', 'trim|required');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/staffs/add'),'refresh');
			}
			else{
				$data = array(
					'staffname' => $this->input->post('staffname'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'district' => $this->input->post('district'),
					'tehsil' => $this->input->post('tehsil'),
					'school_id' => $this->input->post('school_id'),
					'type' => $this->input->post('type'),
					'mobile_no' => $this->input->post('mobile_no'),
					'address' => $this->input->post('address'),
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->staff_model->add_staff($data);
				if($result){
					$this->session->set_flashdata('success', 'Staff has been added successfully!');
					redirect(base_url('admin/staffs'));
				}
			}
		}
		else{

			$data['title'] = 'Add Staff';
			$data['districts'] = $this->staff_model->getDistricts();
			$data['tehsil'] = $this->staff_model->getTehsils();

			//print_r($data['districts']);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/staffs/staff_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}

	//-----------------------------------------------------------
	public function edit($id = 0){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('staffname', 'staffname', 'trim|required');
			$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['staff'] = $this->staff_model->get_staff_by_id($id);
				$data['view'] = 'admin/staffs/staff_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'staffname' => $this->input->post('staffname'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'district' => $this->input->post('district'),
					'school_id' => $this->input->post('school_id'),
					'email' => $this->input->post('email'),
					'type' => $this->input->post('type'),
					'mobile_no' => $this->input->post('mobile_no'),
					'is_active' => $this->input->post('status'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				//print_r($data);die;
				$data = $this->security->xss_clean($data);
				$result = $this->staff_model->edit_staff($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Staff has been updated successfully!');
					redirect(base_url('admin/staffs'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Staff';
			$data['districts'] = $this->staff_model->getDistricts();
			$data['tehsil'] = $this->staff_model->getTehsils();
			$data['staff'] = $this->staff_model->get_staff_by_id($id);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/staffs/staff_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_staff', array('id' => $id));
		$this->session->set_flashdata('success', 'Use has been deleted successfully!');
		redirect(base_url('admin/staffs'));
	}

	//---------------------------------------------------------------
	//  Export Staffs PDF 
	public function create_staffs_pdf(){

		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_staffs'] = $this->staff_model->get_staffs_for_export();
		$this->load->view('admin/staffs/staffs_pdf', $data);
	}

	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_csv(){ 

	   // file name 
		$filename = 'staffs_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

	   // get data 
		$staff_data = $this->staff_model->get_staffs_for_export();

	   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("ID", "Staff Name", "First Name", "Last Name","District","Tehsil","School Name", "Email","Type", "Mobile_no", "Created Date"); 

		fputcsv($file, $header);
		foreach ($staff_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit;
	
	
	}
	public function tehsil_by_district()
	{
		echo json_encode($this->staff_model->getTehsils_by_district($this->input->post('district_id')));
	
}

}
	?>