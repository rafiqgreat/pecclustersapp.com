<?php
	class Tehsil_model extends CI_Model{
		public function add_tehsil($data){
			$this->db->insert('ci_tehsil', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_tehsil(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_tehsil LEFT JOIN ci_districts ON district_id = tehsil_district_id';			
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
	
		public function get_all_district(){				
		$res= [];
		$this->db->select('*')
					 ->from('ci_districts')					
					 ->where('district_status', 1);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			$res[] = $row;
		}
			return $res;
		}
		public function get_tehsil_by_id($id){
			$query = $this->db->get_where('ci_tehsil', array('tehsil_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_tehsil($data, $id){
			$this->db->where('tehsil_id', $id);
			$this->db->update('ci_tehsil', $data);
			return true;
		}
		function change_status()
		{		
			$this->db->set('tehsil_status', $this->input->post('status'));
			$this->db->where('tehsil_id', $this->input->post('tehsil_id'));
			$this->db->update('ci_tehsil');
		} 
		
		public function get_tehsil_for_export(){			
			$this->db->select('*')
					 ->from('ci_tehsil')
					 ->join('ci_districts', 'district_id= tehsil_district_id');
					 //->join('ci_admin', 'admin_id= tehsil_createdby');
			$query = $this->db->get();
			//print_r($this->db->last_query());
			//die();
			return $result = $query->result_array();
		}
		
		public function get_tehsil_csv_export(){			
			$this->db->select('tehsil_id, tehsil_code, tehsil_name_en, tehsil_name_ur,  district_name_en, tehsil_order, IF(tehsil_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_tehsil')
					 ->join('ci_districts', 'district_id= tehsil_district_id');
					 //->join('ci_admin', 'admin_id= tehsil_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>