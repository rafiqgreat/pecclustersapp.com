<?php
	class District_model extends CI_Model{
		public function add_district($data){
			$this->db->insert('ci_districts', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_district(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_districts';			
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
		
		
		public function get_district_by_id($id){
			$query = $this->db->get_where('ci_districts', array('district_id' => $id));
			return $result = $query->row_array();
		}
				
		function change_status()
		{		
			$this->db->set('district_status', $this->input->post('district_status'));
			$this->db->where('district_id', $this->input->post('district_id'));
			$this->db->update('ci_districts');
		} 
		
		
		
		public function edit_district($data, $id){
			$this->db->where('district_id', $id);
			$this->db->update('ci_districts', $data);
			return true;
		}
		
		public function get_district_for_export(){			
			$this->db->select('*')
					 ->from('ci_districts')
					 ->join('ci_districts', 'district_id= district_district_id');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_district_csv_export(){			
			$this->db->select('district_id, district_code, district_name_en, district_name_ur, district_latitude, district_longitude, IF(district_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_districts');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
	}
?>