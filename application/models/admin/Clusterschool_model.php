<?php
	class Clusterschool_model extends CI_Model{

		public function add($data){
			$this->db->insert('ci_schools', $data);
			return true;
		}

		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		/*public function get_all_schools($school_district_id, $school_tehsil_id, $school_type, $school_gender){		
			$wh =array();
			//$SQL ='SELECT * FROM ci_schools LEFT JOIN ci_districts ON district_id = school_district_id LEFT JOIN ci_admin ON admin_id = school_createdby';
			$SQL ='SELECT ci_schools.*, ci_admin.username AS aname, ci_districts.district_name_en, ci_tehsil.tehsil_name_en  FROM ci_schools LEFT JOIN ci_districts ON district_id = school_district_id LEFT JOIN ci_tehsil ON tehsil_id = school_tehsil_id LEFT JOIN ci_admin ON admin_id = school_createdby';				
			
			if($this->session->userdata('role_id') == 7){
				$wh[] = "school_district_id = ".$this->session->userdata('u_district_id');
				
			}else{
				if($school_district_id != 0){
				$wh[] = "school_district_id = ".$school_district_id;
				}
			}
			if($this->session->userdata('role_id') == 8){
				$wh[] = "school_tehsil_id = ".$this->session->userdata('u_tehsil_id');
			}else{
				if($school_tehsil_id != 0){
				$wh[] = "school_tehsil_id = ".$school_tehsil_id;
				}
			}

			
			
			if($school_type != ''){
				$wh[] = 'school_type = "'.$school_type.'"';
			}
			//$wh[] = 'school_type = "'.$school_type.'"';
			if($school_gender != ''){
				$wh[] = 'school_gender = "'.$school_gender.'"';
			}

			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				//print $WHERE;
				return $this->datatable->LoadJson($SQL,$WHERE);
				/*echo $this->db->last_query();
			die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}*/
		public function get_all_clustercenter()
		{		
			$wh =array();
			//$SQL ='SELECT * FROM ci_schools LEFT JOIN ci_districts ON district_id = school_district_id LEFT JOIN ci_admin ON admin_id = school_createdby';
			$SQL ='SELECT * FROM ci_schools LEFT JOIN ci_districts ON district_id = cs_district_id LEFT JOIN ci_tehsil ON tehsil_id = cs_tehsil_id LEFT JOIN ci_admin ON admin_id = cs_createdby ';				
			$wh[]='cs_type="CLUSTER"';
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
		
		public function get_all_pef_school()
		{		
			$wh =array();
			//$SQL ='SELECT * FROM ci_schools LEFT JOIN ci_districts ON district_id = school_district_id LEFT JOIN ci_admin ON admin_id = school_createdby';
			$SQL ='SELECT * FROM ci_schools LEFT JOIN ci_districts ON district_id = cs_district_id LEFT JOIN ci_tehsil ON tehsil_id = cs_tehsil_id LEFT JOIN ci_admin ON admin_id = cs_createdby ';				
			$wh[]='cs_type="PEF"';
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
		
		public function get_all_districts()
		{	
			$this->db->select('district_id, district_name_en')
					 ->from('ci_districts')					 
					 ->where('district_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_tehsils()
		{	
			$this->db->select('tehsil_id, tehsil_name_en')
					 ->from('ci_tehsil')					 
					 ->where('tehsil_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
			//$result = $query->result_array();
			//print_r($result);
			//die();
		}
		
		public function get_all_clustercenters($id)
		{	
			$this->db->select('cs_id, cs_name')
					 ->from('ci_schools')	
					 ->where('cs_type', "CLUSTER")
					 ->where('cs_district_id', $id)				 
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_parent_name($id)
		{	
			$this->db->select('cs_id, cs_name')
					 ->from('ci_schools')	
					 ->where('cs_id', $id)				 
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_clusterschool_by_id($id){
			$query = $this->db->get_where('ci_schools', array('cs_id' => $id));
			return $result = $query->row_array();
		}
				
		function change_status()
		{		
			$this->db->set('cs_status', $this->input->post('cs_status'));
			$this->db->where('cs_id', $this->input->post('cs_id'));
			$this->db->update('ci_schools');
		} 
		
		public function edit($data, $id){
			$this->db->where('cs_id', $id);
			$this->db->update('ci_schools', $data);
			return true;
		}
		
		public function get_pefschool_for_export(){
			$this->db->select('*')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= cs_district_id')
					 ->join('ci_tehsil', 'tehsil_id= cs_tehsil_id')
					 ->join('ci_admin', 'admin_id= cs_createdby')
					 ->where('cs_type', "PEF")
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_pefschool_csv_export(){
			//array("ID", "UserName", "School Deptt.", "Type", "Name", "Address", "District", "Tehsil", "Level", "Gender", "Email", "Phone", "Location", "Status")			
			$this->db->select('cs_id, cs_type, cs_parent, cs_name, cs_address, district_name_en, tehsil_name_en, cs_gender, IF(cs_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= cs_district_id')
					 ->join('ci_tehsil', 'tehsil_id= cs_tehsil_id')
					 ->join('ci_admin', 'admin_id= cs_createdby')
					 ->where('cs_type', "PEF")
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//--------------------------------------------------
		public function get_culschool_for_export(){
			$this->db->select('*')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= cs_district_id')
					 ->join('ci_tehsil', 'tehsil_id= cs_tehsil_id')
					 ->join('ci_admin', 'admin_id= cs_createdby')
					 ->where('cs_type', "CLUSTER")
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_culschool_csv_export(){
			//array("ID", "UserName", "School Deptt.", "Type", "Name", "Address", "District", "Tehsil", "Level", "Gender", "Email", "Phone", "Location", "Status")			
			$this->db->select('cs_id, cs_type, cs_name, cs_address, district_name_en, tehsil_name_en, cs_gender, IF(cs_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= cs_district_id')
					 ->join('ci_tehsil', 'tehsil_id= cs_tehsil_id')
					 ->join('ci_admin', 'admin_id= cs_createdby')
					 ->where('cs_type', "CLUSTER")
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//----------------------------------------------------
		function get_tehsil_by_district($district_id)
		{
			$this->db->select('tehsil_id, tehsil_name_en, tehsil_name_ur')
					 ->from('ci_tehsil')
					 ->where('tehsil_district_id', $district_id)
					 ->where('tehsil_status', 1);					 
			$query = $this->db->get();			
			return $query->result_array();
		}
		function get_clustercenter_by_district($district_id)
		{
			$this->db->select('cs_id, cs_name')
					 ->from('ci_schools')
					 ->where('cs_district_id', $district_id)
					 ->where('cs_type', "CLUSTER")
					 ->where('cs_status', 1);					 
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_school_info_by_id($id = 0){			
			$this->db->select('*')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= school_district_id')
					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
					 ->where('school_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		function username_exist( $username ) {
			$this->db->select( '*' );
			$this->db->from( 'ci_schools' );
			$this->db->where( 'username', $username );
			$query = $this->db->get();
			$result = $query->result_array();		
			return $result;
		}
		public function get_school_for_dfp(){			
			$this->db->select('district_name_en,tehsil_name_en,count(school_id) as schools, sum(case when school_type = "Private" then 1 else 0 end) as privateschools, sum(case when school_type = "Public" then 1 else 0 end) as publicschools, school_tehsil_id')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= school_district_id')
					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
					 ->where('school_district_id', $this->session->userdata('u_district_id'))
					 ->group_by('school_tehsil_id');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_school_for_tfp(){			
			$this->db->select('district_name_en,tehsil_name_en,count(school_id) as schools, sum(case when school_type = "Private" then 1 else 0 end) as privateschools, sum(case when school_type = "Public" then 1 else 0 end) as publicschools')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= school_district_id')
					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
					 ->where('school_tehsil_id', $this->session->userdata('u_tehsil_id'))
					 ->group_by('school_tehsil_id');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_school_for_admin(){			
			$this->db->select('district_name_en,tehsil_name_en,count(school_id) as schools, sum(case when school_type = "Private" then 1 else 0 end) as privateschools, sum(case when school_type = "Public" then 1 else 0 end) as publicschools, school_tehsil_id, school_district_id')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= school_district_id')
					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
					 ->group_by('school_district_id');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		/////////////////////////////////////////////////////////////
		public function get_mcq_stats_for_dfp($tehsil_id)
		{
			$this->db->select('fp_id, tehsil_name_en, 
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fp_grade_id = 5 then 1 else 0 end) as 5_mcqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fp_grade_id = 6 then 1 else 0 end) as 6_mcqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fp_grade_id = 7 then 1 else 0 end) as 7_mcqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fp_grade_id = 8 then 1 else 0 end) as 8_mcqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fp_grade_id = 9 then 1 else 0 end) as 9_mcqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fp_grade_id = 10 then 1 else 0 end) as 10_mcqs')
						 ->from('ci_final_paper_mcq')
						 ->join('ci_schools', 'school_id= fp_school_id')
						 ->join('ci_tehsil', 'tehsil_id='. $tehsil_id)
						 ->where('school_district_id', $this->session->userdata('u_district_id'))
						 ->group_by('school_tehsil_id');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function get_crq_stats_for_dfp($tehsil_id)
		{
			$this->db->select('fpc_id, tehsil_name_en, 
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fpc_grade_id = 5 then 1 else 0 end) as 5_crqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fpc_grade_id = 6 then 1 else 0 end) as 6_crqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fpc_grade_id = 7 then 1 else 0 end) as 7_crqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fpc_grade_id = 8 then 1 else 0 end) as 8_crqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fpc_grade_id = 9 then 1 else 0 end) as 9_crqs,
								sum(case when school_district_id = "'.$this->session->userdata('u_district_id').'" AND school_tehsil_id = '.$tehsil_id.' AND fpc_grade_id = 10 then 1 else 0 end) as 10_crqs')
						 ->from('ci_final_paper_crq')
						 ->join('ci_schools', 'school_id= fpc_school_id')
						 ->join('ci_tehsil', 'tehsil_id='. $tehsil_id)
						 ->where('school_district_id', $this->session->userdata('u_district_id'))
						 ->group_by('school_tehsil_id');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		public function get_schools_by_tehsil($id){			
			$this->db->select('*')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id = school_district_id')
					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
					 //->join('ci_final_paper_mcq', 'fp_school_id = school_id', 'left')
					 //->join('ci_final_paper_crq', 'fpc_school_id= school_id', 'left')
					 ->where('school_tehsil_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_mcq_stats_for_school($id)
		{
			$this->db->select('sum(case when fp_grade_id = 5 then 1 else 0 end) as 5_mcqs, sum(case when fp_grade_id = 6 then 1 else 0 end) as 6_mcqs, sum(case when fp_grade_id = 7 then 1 else 0 end) as 7_mcqs, sum(case when fp_grade_id = 8 then 1 else 0 end) as 8_mcqs, sum(case when fp_grade_id = 9 then 1 else 0 end) as 9_mcqs, sum(case when fp_grade_id = 10 then 1 else 0 end) as 10_mcqs')
						 ->from('ci_final_paper_mcq')
						 ->where('fp_school_id', $id)
						 ->order_by('fp_grade_id');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function get_crq_stats_for_school($id)
		{
			$this->db->select('sum(case when  fpc_grade_id = 5 then 1 else 0 end) as 5_crqs, sum(case when  fpc_grade_id = 6 then 1 else 0 end) as 6_crqs, sum(case when  fpc_grade_id = 7 then 1 else 0 end) as 7_crqs, sum(case when  fpc_grade_id = 8 then 1 else 0 end) as 8_crqs, sum(case when  fpc_grade_id = 9 then 1 else 0 end) as 9_crqs, sum(case when  fpc_grade_id = 10 then 1 else 0 end) as 10_crqs')
						 ->from('ci_final_paper_crq')
						 ->where('fpc_school_id', $id)
						 ->order_by('fpc_grade_id');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
	}
?>