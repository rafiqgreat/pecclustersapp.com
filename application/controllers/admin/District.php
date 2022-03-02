<?php defined('BASEPATH') OR exit('No direct script access allowed');
class District extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/District_model', 'District_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'District List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/district/district_list');
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
		$records = $this->District_model->get_all_district();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['district_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['district_code'],
				$row['district_name_en'],
				$row['district_name_ur'],
				
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['district_id'].'" 
				id="cb_'.$row['district_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['district_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/district/edit/'.$row['district_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/district/edit/'.$row['district_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/district/delete/".$row['district_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->District_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('district_code', 'District Code', 'trim|required');
			$this->form_validation->set_rules('district_name_en', 'District Name (Eng)', 'trim|required');
			$this->form_validation->set_rules('district_name_ur', 'District Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('district_latitude', 'District Latitude', 'trim|required');
			$this->form_validation->set_rules('district_longitude', 'District Longitude', 'trim|required');
			$this->form_validation->set_rules('district_status', 'District Status', 'trim|required');
			
			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/district/add'),'refresh');
			}
			else{
				$data = array(					
					'district_code' => $this->input->post('district_code'),
					'district_name_en' => $this->input->post('district_name_en'),
					'district_name_ur' => $this->input->post('district_name_ur'),
					'district_latitude' => $this->input->post('district_latitude'),
					'district_longitude' => $this->input->post('district_longitude'),
					'district_sort' => $this->input->post('district_sort'),
					'district_status' => $this->input->post('district_status'),	
					'district_createdby' =>$this->session->userdata('district_createdby')
				);
				$data = $this->security->xss_clean($data);
				//print_r($data);
				//die();
				$result = $this->District_model->add_district($data);
				if($result){
					$this->session->set_flashdata('success', 'District has been added successfully!');
					redirect(base_url('admin/district'));
				}
			}
		}
		else{
			$data['title'] = 'Add District';
			//$data['districts'] = $this->District_model->get_all_districts();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/district/district_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){			
			$this->form_validation->set_rules('district_code', 'District Code', 'trim|required');
			$this->form_validation->set_rules('district_name_en', 'District Name (Eng)', 'trim|required');
			$this->form_validation->set_rules('district_name_ur', 'District Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('district_latitude', 'District Latitude', 'trim|required');
			$this->form_validation->set_rules('district_longitude', 'District Longitude', 'trim|required');
			$this->form_validation->set_rules('district_status', 'District Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['district'] = $this->District_model->get_district_by_id($id);
				$data['view'] = 'admin/district/district_edit';
				$this->load->view('layout', $data);
			}
			else{				
				$data = array(					
					'district_code' => $this->input->post('district_code'),
					'district_name_en' => $this->input->post('district_name_en'),
					'district_name_ur' => $this->input->post('district_name_ur'),
					'district_latitude' => $this->input->post('district_latitude'),
					'district_longitude' => $this->input->post('district_longitude'),
					'district_sort' => $this->input->post('district_sort'),
					'district_status' => $this->input->post('district_status'),	
					'district_updatedby' =>$this->session->userdata('district_updatedby')					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->District_model->edit_district($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'District has been updated successfully!');
					redirect(base_url('admin/district'));
				}
			}
		}
		else{
			$data['title'] = 'Edit School';
			$data['district'] = $this->District_model->get_district_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/district/district_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_districts', array('district_id' => $id));
		$this->session->set_flashdata('success', 'District has been deleted successfully!');
		redirect(base_url('admin/district'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_district_pdf(){
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_district'] = $this->District_model->get_district_for_export();
		$this->load->view('admin/district/district_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_district_csv(){ 
	   // file name 
		$filename = 'district_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv;");
	   // get data 
		$district_data = $this->District_model->get_district_csv_export();
		// file creation 
		$file = fopen('php://output', 'w');
		$header = array("ID", "Code", "Name (Eng)", "Name (Urdu)", "Latitude", "Longitude", "Status"); 
		fputcsv($file, $header);
		foreach ($district_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
?>