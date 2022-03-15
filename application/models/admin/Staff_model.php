<?php
	class Staff_model extends CI_Model{

		public function add_staff($data){
			$this->db->insert('ci_staff', $data);
			return true;
		}

		//---------------------------------------------------
		// get all staffs for server-side datatable processing (ajax based)
		public function get_all_staffs(){
			$wh =array();
			$SQL ='SELECT *, district_name_en, tehsil_name_en FROM ci_staff s
			LEFT JOIN ci_districts d ON s.district = d.district_id
			LEFT JOIN ci_tehsil t ON s.tehsil = t.tehsil_id
			LEFT JOIN ci_schools sc ON s.school_id = sc.cs_id';	
			/*'SELECT *, district_name_en, tehsil_name_en FROM ci_staff s INNER JOIN ci_districts d ON s.district = d.district_id INNER JOIN ci_tehsil t ON s.tehsil = t.tehsil_id INNER JOIN ci_schools sc ON s.school_id = sc.cs_id'*/	
			if($_SESSION['admin_role_id']!=1){$wh[]='district='.$_SESSION['district_dadmin'];}	
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}


		//---------------------------------------------------
		// Get staff detial by ID
		public function get_staff_by_id($id){
			$query = $this->db->get_where('ci_staff', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit staff Record
		public function edit_staff($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_staff', $data);
			return true;
		}

		//---------------------------------------------------
		// Change staff status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ci_staff');
		} 

		//---------------------------------------------------
		// get staffs for csv export
		public function get_staffs_for_export()
		{
			//$this->db->where('is_admin', 0);
			$this->db->select('id, staffname, firstname, lastname, email, mobile_no, created_at');
			$this->db->from('ci_staff');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_staffs_for_export_csv()
		{
			//$this->db->where('is_admin', 0);
			$this->db->select('id, staffname, firstname, lastname, email, mobile_no, district_name_en, tehsil_name_en, cs_name, type, created_at');
			$this->db->from('ci_staff');
			$this->db->join('ci_districts', 'district = district_id', 'left');
			$this->db->join('ci_tehsil', 'tehsil = tehsil_id', 'left');
			$this->db->join('ci_schools', 'school_id = cs_id', 'left');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function getDistricts()
		{
			$this->db->where('district_status', 1);
			$this->db->where('district_id', $this->session->userdata('district_dadmin'));
			$this->db->select('*');
			$this->db->from('ci_districts');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function getTehsils()
		{	
			$this->db->select('*')
					 ->from('ci_tehsil')					 
					 ->where('tehsil_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
			//$result = $query->result_array();
			//print_r($result);
			//die();
		}
		public function getTehsils_by_district($district_id)
		{
			$this->db->select('tehsil_id, tehsil_name_en, tehsil_name_ur')
					 ->from('ci_tehsil')
					 ->where('tehsil_district_id', $district_id)
					 ->where('tehsil_status', 1);					 
			$query = $this->db->get();			
			return $query->result_array();
		}
		public function getSchools_by_tehsil($tehsil_id)
		{
			$this->db->select('cs_id, cs_name, cs_address')
					 ->from('ci_schools')
					 ->where('cs_tehsil_id', $tehsil_id)
					 ->where('cs_status', 1);					 
			$query = $this->db->get();			
			return $query->result_array();
		}
		public function getClusterSchools_by_tehsil($tehsil_id)
		{
			$this->db->select('cs_id, cs_name, cs_address')
					 ->from('ci_schools')
					 ->where('cs_tehsil_id', $tehsil_id)
					 ->where('cs_type', 'CLUSTER')
					 ->where('cs_status', 1);					 
			$query = $this->db->get();			
			return $query->result_array();
		}
		public function getSchools()
		{	
			$this->db->select('*')
					 ->from('ci_schools')					 
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
	?>
		
