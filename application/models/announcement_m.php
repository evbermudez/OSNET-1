<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Announcement_m extends CI_Model {
		
		/*    
		Branch: JEFFREY-announcements_table_db_change_07/11/2014
		Changes:  whole announcement_m.php
		*/
		
		public function save_announcement($title, $duration, $message, $id = NULL){
		
				$duration_token = explode(" ", $duration);
				
				$data['announcement_title'] = $title;
				$data['duration_start'] = date('Y-m-d', strtotime($duration_token[0]));
				$data['duration_end'] = date('Y-m-d', strtotime($duration_token[2]));
				$data['announcement_message'] = $message;
				$data['user_id'] = 0;
				$data['feature_id'] = 0;
				$data['feedback'] = 'feedback';
				
				if($id == NULL)
					$this->db->insert('announcement', $data);
				else
					$this->db->where('announcement_id', $id)->update('announcement' ,$data);
				
				$id = $this->db->insert_id();
		}
		 
		
		
		public function get_announcement($id = NULL){
			$date = date("Y-m-d");
			$this->db->select('announcement_id, announcement_title, duration_start, duration_end, announcement_message');
			if($id !== NULL)
				$this->db->where('announcement_id', $id);
			$this->db->where('archive', NULL);
			$this->db->where('duration_start <=', $date);
			$this->db->where('duration_end >=', $date);
			$this->db->order_by('duration_start', "DESC");
			$this->db->limit(5);
			$query = $this->db->get('announcement');
			return $query->result_array();
		}
		
		public function archive_announcement($id = NULL){
			$date = date("Y-m-d");
			$data['archive'] = $date;
			if($id != NULL)
				$this->db->where('announcement_id', $id)->update('announcement', $data);
		}


	}

