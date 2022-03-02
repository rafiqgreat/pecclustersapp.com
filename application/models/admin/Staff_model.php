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
			$SQL ='SELECT * FROM ci_staff';			
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
		public function get_staffs_for_export(){
			
			$this->db->where('is_admin', 0);
			$this->db->select('id, staffname, firstname, lastname, email, mobile_no, created_at');
			$this->db->from('ci_staff');
			$query = $this->db->get();
			return $result = $query->result_array();
		}

	}

?>