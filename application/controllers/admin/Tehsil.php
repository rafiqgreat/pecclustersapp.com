<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tehsil extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Tehsil_model', 'Tehsil_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		//die('index');
		$data['title'] = 'Tehsil List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/tehsil/tehsil_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->Tehsil_model->get_all_tehsil();
		//die('data-table');
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['tehsil_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['tehsil_name_en'],
				$row['tehsil_name_ur'],
				$row['district_name_en'],
				$row['tehsil_order'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['tehsil_id'].'" 
				id="cb_'.$row['tehsil_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['tehsil_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/tehsil/edit/'.$row['tehsil_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/tehsil/edit/'.$row['tehsil_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/tehsil/delete/".$row['tehsil_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('tehsil_district_id', 'District', 'trim|required');
			$this->form_validation->set_rules('tehsil_code', 'Tehsil Code', 'trim|required');
			$this->form_validation->set_rules('tehsil_name_en', 'Tehsil Name (English)', 'trim|required');
			$this->form_validation->set_rules('tehsil_name_ur', 'Tehsil Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('tehsil_order', 'Tehsil Order', 'trim|required');
			$this->form_validation->set_rules('tehsil_status', 'Tehsil Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/tehsil/add'),'refresh');
			}
			else{
				$data = array(					
					'tehsil_district_id' => $this->input->post('tehsil_district_id'),
					'tehsil_code' => $this->input->post('tehsil_code'),
					'tehsil_name_en' => $this->input->post('tehsil_name_en'),
					'tehsil_name_ur' => $this->input->post('tehsil_name_ur'),
					'tehsil_order' => $this->input->post('tehsil_order'),
					'tehsil_status' => $this->input->post('tehsil_status'),
					'tehsil_createdby' =>$this->session->userdata('admin_id')					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Tehsil_model->add_tehsil($data);
				if($result){
					$this->session->set_flashdata('success', 'Tehsil has been added successfully!');
					redirect(base_url('admin/tehsil'));
				}
			}
		}
		else{
			$data['title'] = 'Add Tehsil';
			$data['districts'] = $this->Tehsil_model->get_all_district();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/tehsil/tehsil_add');
			$this->load->view('admin/includes/_footer');
		}
	}
	
//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('tehsil_district_id', 'District', 'trim|required');
			$this->form_validation->set_rules('tehsil_code', 'Tehsil Code', 'trim|required');
			$this->form_validation->set_rules('tehsil_name_en', 'Tehsil Name (English)', 'trim|required');
			$this->form_validation->set_rules('tehsil_name_ur', 'Tehsil Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('tehsil_order', 'Tehsil Order', 'trim|required');
			$this->form_validation->set_rules('tehsil_status', 'Tehsil Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['tehsil'] = $this->Tehsil_model->get_tehsil_by_id($id);
				$data['view'] = 'admin/tehsil/tehsil_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'tehsil_district_id' => $this->input->post('tehsil_district_id'),
					'tehsil_code' => $this->input->post('tehsil_code'),
					'tehsil_name_en' => $this->input->post('tehsil_name_en'),
					'tehsil_name_ur' => $this->input->post('tehsil_name_ur'),
					'tehsil_order' => $this->input->post('tehsil_order'),
					'tehsil_status' => $this->input->post('tehsil_status'),
					'tehsil_createdby' =>$this->session->userdata('admin_id')	
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Tehsil_model->edit_tehsil($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Tehsil has been updated successfully!');
					redirect(base_url('admin/tehsil'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Tehsils';
			$data['districts'] = $this->Tehsil_model->get_all_district();
			$data['tehsils'] = $this->Tehsil_model->get_tehsil_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/tehsil/tehsil_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}	
	//-----------------------------------------------------------
	public function change_status()
	{   
		$this->Tehsil_model->change_status();
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$this->db->delete('ci_tehsil', array('tehsil_id' => $id));
		$this->session->set_flashdata('success', 'Tehsil has been deleted successfully!');
		redirect(base_url('admin/tehsil'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_tehsil_pdf()
	{
		$data['all_tehsil'] = $this->Tehsil_model->get_tehsil_for_export();
		$this->load->view('admin/tehsil/tehsil_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_tehsil_csv(){ 
	   // file name 
		$filename = 'tehsil_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$tehsil_data = $this->Tehsil_model->get_tehsil_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("TehsilID", "TehsilCode", "TehsilName(Eng)", "TehsilName(Urdu)", "DistrictName", "TehsilOrder", "TehsilStatus"); 
		fputcsv($file, $header);
		foreach ($tehsil_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
	?>