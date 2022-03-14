<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Clusterschool extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Clusterschool_model', 'Clusterschool_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index()
	{
		$data['title'] = 'Cluster Center List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/clusterschool/clustercenter_list');
		$this->load->view('admin/includes/_footer');
	}
	public function pef_school()
	{
		//die('pef_school');
		$data['title'] = 'School List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/clusterschool/school_list');
		$this->load->view('admin/includes/_footer');
	}
	
	/*public function schools_report()
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
		$this->load->view('admin/includes/_footer');
	}*/
	
	public function datatable_json()
	{	
		$records = $this->Clusterschool_model->get_all_clustercenter();
 		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{
			$status = ($row['cs_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['cs_type'],
				$row['cs_name'],
				$row['cs_address'],
				$row['district_name_en'],
				$row['tehsil_name_en'],
				$row['cs_gender'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['cs_id'].'" 
				id="cb_'.$row['cs_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['cs_id'].'"></label>',		
				'<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/clusterschool/edit/'.$row['cs_id']).'"> <i class="fa fa-pencil-square-o"></i></a>'
				//<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/clusterschool/delete/".$row['cs_id']."_".$row['cs_type']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//------------------------------------------------------------------------------------------
	public function datatable_json_pef_school()
	{	
		$records = $this->Clusterschool_model->get_all_pef_school();
 		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{
			if($row['cs_parent']!="")
			{
				$parent = $this->Clusterschool_model->get_parent_name($row['cs_parent']);
				if(!empty($parent)){$parent = $parent[0]['cs_name'];}else{$parent = "Cluster has been deleted";}
			}
			else
			{
				$parent = "No Cluster Center";
			}
			
			$status = ($row['cs_status'] == 1)? 'checked': '';
			$data[] = array(
				++$i,
				$row['cs_type'],
				$parent,
				$row['cs_name'],
				$row['cs_address'],
				$row['district_name_en'],
				$row['tehsil_name_en'],
				$row['cs_gender'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['cs_id'].'" 
				id="cb_'.$row['cs_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['cs_id'].'"></label>',		
				'<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/clusterschool/edit/'.$row['cs_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/clusterschool/delete/".$row['cs_id']."_".$row['cs_type']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Clusterschool_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('cs_type', 'Type', 'trim|required');
			$this->form_validation->set_rules('cs_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('cs_address', 'Address', 'trim|required');
			$this->form_validation->set_rules('cs_district_id', 'District', 'trim');
			$this->form_validation->set_rules('cs_tehsil_id', 'Tehsil', 'trim');
			$this->form_validation->set_rules('cs_level', 'Level', 'trim|required');
			$this->form_validation->set_rules('cs_gender', 'Geneder', 'trim|required');
			$this->form_validation->set_rules('cs_email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('cs_phone', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('cs_contact_name', 'Contact Name', 'trim|required');
			$this->form_validation->set_rules('cs_contact_mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('cs_location', 'Location', 'trim|required');
			$this->form_validation->set_rules('cs_status', 'Status', 'trim|required');
			if($this->input->post('cs_type')=="PEF")
			{
				$this->form_validation->set_rules('cs_parent', 'Parent', 'trim|required');	
			}
			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/clusterschool/add'),'refresh');
			}
			else{
				$data = array(					
					'cs_type' => $this->input->post('cs_type'),
					'cs_name' => $this->input->post('cs_name'),
					'cs_address' => $this->input->post('cs_address'),
					'cs_district_id' => $this->input->post('cs_district_id'),
					'cs_tehsil_id' => $this->input->post('cs_tehsil_id'),	
					'cs_level' =>$this->input->post('cs_level'),
					'cs_gender' =>$this->input->post('cs_gender'),
					'cs_email' => $this->input->post('cs_email'),
					'cs_phone' => $this->input->post('cs_phone'),
					'cs_contact_name' => $this->input->post('cs_contact_name'),
					'cs_contact_mobile' => $this->input->post('cs_contact_mobile'),
					'cs_location' => $this->input->post('cs_location'),
					'cs_status' => $this->input->post('cs_status'),	
					'cs_createdby' =>$this->session->userdata('admin_id'),
					'cs_last_ip' =>$this->input->post('192.168.1.121'),
					'cs_last_login' =>$this->input->post('cs_last_login')
				);
				if($this->input->post('cs_type')=="PEF")
				{
					$data['cs_parent'] = $this->input->post('cs_parent');	
				}
				
				//$data = $this->security->xss_clean($data);
				//echo '<pre>';
				//print_r($data);
				//die();
				$result = $this->Clusterschool_model->add($data);
				if($result){
					if($this->input->post('cs_type')=="CLUSTER"){
						$this->session->set_flashdata('success', 'Cluster Center has been added successfully!');
						redirect(base_url('admin/clusterschool'));
					}
					else{
						$this->session->set_flashdata('success', 'School has been added successfully!');
						redirect(base_url('admin/clusterschool/pef_school'));
					}
				}
			}
		}
		else{
			$data['title'] = 'Add Cluster Center/School';
			$data['districts'] = $this->Clusterschool_model->get_all_districts();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/clusterschool/clusterschool_add');
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('cs_type', 'Type', 'trim|required');
			$this->form_validation->set_rules('cs_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('cs_address', 'Address', 'trim|required');
			$this->form_validation->set_rules('cs_district_id', 'District', 'trim');
			$this->form_validation->set_rules('cs_tehsil_id', 'Tehsil', 'trim');
			$this->form_validation->set_rules('cs_level', 'Level', 'trim|required');
			$this->form_validation->set_rules('cs_gender', 'Geneder', 'trim|required');
			$this->form_validation->set_rules('cs_email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('cs_phone', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('cs_contact_name', 'Contact Name', 'trim|required');
			$this->form_validation->set_rules('cs_contact_mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('cs_location', 'Location', 'trim|required');
			$this->form_validation->set_rules('cs_status', 'Status', 'trim|required');
			if($this->input->post('cs_type')=="PEF")
			{
				$this->form_validation->set_rules('cs_parent', 'Parent', 'trim|required');	
			}
			
			if ($this->form_validation->run() == FALSE) {
				$data['culsch'] = $this->Clusterschool_model->get_clusterschool_by_id($id);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/clusterschool/clusterschool_edit');
				$this->load->view('admin/includes/_footer');
			}
			else{
				$cs_type = $this->input->post('cs_type');
				$data = array(	
						'cs_type' => $this->input->post('cs_type'),
						'cs_name' => $this->input->post('cs_name'),
						'cs_address' => $this->input->post('cs_address'),
						'cs_district_id' => $this->input->post('cs_district_id'),
						'cs_tehsil_id' => $this->input->post('cs_tehsil_id'),	
						'cs_level' =>$this->input->post('cs_level'),
						'cs_gender' =>$this->input->post('cs_gender'),
						'cs_email' => $this->input->post('cs_email'),
						'cs_phone' => $this->input->post('cs_phone'),
						'cs_contact_name' => $this->input->post('cs_contact_name'),
						'cs_contact_mobile' => $this->input->post('cs_contact_mobile'),
						'cs_location' => $this->input->post('cs_location'),
						'cs_status' => $this->input->post('cs_status'),	
						'cs_createdby' =>$this->session->userdata('admin_id'),
						'cs_last_ip' =>$this->input->post('192.168.1.121'),
						'cs_last_login' =>$this->input->post('cs_last_login')
					);					
				if($this->input->post('cs_type')=="PEF")
				{
					$data['cs_parent'] = $this->input->post('cs_parent');	
				}	
				//$data = $this->security->xss_clean($data);
				$result = $this->Clusterschool_model->edit($data, $id);
				if($result){
					if($this->input->post('cs_type')=="CLUSTER"){
						$this->session->set_flashdata('success', 'Cluster Center has been updated successfully!');
						redirect(base_url('admin/clusterschool'));
					}
					else{
						$this->session->set_flashdata('success', 'School has been updated successfully!');
						redirect(base_url('admin/clusterschool/pef_school'));
					}
					
				}
			}
		}
		else{
			$data['title'] = 'Edit School';
			$data['culsch'] = $this->Clusterschool_model->get_clusterschool_by_id($id);
			$data['districts'] = $this->Clusterschool_model->get_all_districts();
			$data['tehsils'] = $this->Clusterschool_model->get_all_tehsils();
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/clusterschool/clusterschool_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($params)
	{
		$params  = explode("_", $params);
		$this->db->delete('ci_schools', array('cs_id' => $params[0]));
		if($params[1]=="CLUSTER")
		{
			$this->session->set_flashdata('success', 'Cluster Center has been deleted successfully!');
			redirect(base_url('admin/clusterschool'));
		}
		else
		{
			$this->session->set_flashdata('success', 'School has been deleted successfully!');
			redirect(base_url('admin/clusterschool/pef_school'));
		}
	}
	//---------------------------------------------------------------
	public function create_pefschool_pdf(){
		ini_set("pcre.backtrack_limit", "5000000");
		
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_pefschool'] = $this->Clusterschool_model->get_pefschool_for_export();
		$this->load->view('admin/clusterschool/pefschool_pdf', $data);
	}
	//---------------------------------------------------------------	
	public function export_pefschool_csv(){ 
		$filename = 'pefschool_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv;");
		$pefschool_data = $this->Clusterschool_model->get_pefschool_csv_export();
		$file = fopen('php://output', 'w');
		$header = array("ID", "Type", "Cluster Center Name", "Name", "Address", "Tehsil", "District", "Gender", "Status"); 
		fputcsv($file, $header);
		foreach ($pefschool_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	//-------------------------------------------------------------------
	public function create_culschool_pdf(){
		ini_set("pcre.backtrack_limit", "5000000");
		
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_culschool'] = $this->Clusterschool_model->get_culschool_for_export();
		$this->load->view('admin/clusterschool/culschool_pdf', $data);
	}
	//---------------------------------------------------------------	
	public function export_culschool_csv(){ 
		$filename = 'culschool_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv;");
		$culschool_data = $this->Clusterschool_model->get_culschool_csv_export();
		$file = fopen('php://output', 'w');
		$header = array("ID", "Type", "Name", "Address", "Tehsil", "District", "Gender", "Status"); 
		fputcsv($file, $header);
		foreach ($culschool_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	//-------------------------------------------------------------------
	public function tehsil_by_district()
	{
		echo json_encode($this->Clusterschool_model->get_tehsil_by_district($this->input->post('district_id')));
	}
	public function clustercenter_by_district()
	{
		echo json_encode($this->Clusterschool_model->get_clustercenter_by_district($this->input->post('district_id')));
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