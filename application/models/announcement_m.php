<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Announcement_m extends CI_Model {
		
		/*    
		Branch: JEFFREY-announcements_table_db_change_07/11/2014
		Added:  whole announcement_m.php
		*/
		
		public function save_announcement($title, $duration, $message, $id = NULL){
			$this->load->model('user_m');
			$username = $this->session->userdata('username');
			
			$user_id = $this->user_m->get_user_id($username);
			foreach($user_id as $userid)
				$userid = $userid->user_id;
				
			$duration_token = explode(" ", $duration);
			
			$data['announcement_title'] = $title;
			$data['duration_start'] = date('Y-m-d', strtotime($duration_token[0]));
			$data['duration_end'] = date('Y-m-d', strtotime($duration_token[2]));
			$data['announcement_message'] = $message;
			$data['user_id'] = $userid;
			$data['feature_id'] = 0;
			$data['feedback'] = 'feedback';
			
			if($id == NULL)
				$this->db->insert('announcement', $data);
			else
				$this->db->where('announcement_id', $id)->update('announcement' ,$data);
			
			$id = $this->db->insert_id();
		}
		 
		
		
		public function get_announcement($id = NULL, $start = NULL, $end = NULL){
			$date = date("Y-m-d");
			$this->db->select('announcement_id, announcement_title, duration_start, duration_end, announcement_message');
			if($id !== NULL)
				$this->db->where('announcement_id', $id);
			$this->db->where('archive', NULL);
			$this->db->where('duration_start <=', $date);
			$this->db->where('duration_end >=', $date);
			$this->db->order_by('duration_start', "DESC");
			if($start !== NULL && $end !== NULL)
				$this->db->limit($start, $end);
			$query = $this->db->get('announcement');
			return $query->result_array();
		}
		
		public function count_announcement(){
			$temp_data = $this->get_announcement();
			$count = 0;
			foreach($temp_data as $data)
				$count++;
			return $count;
		}
		
		public function archive_announcement($id = NULL){
			$date = date("Y-m-d");
			$data['archive'] = $date;
			if($id != NULL)
				$this->db->where('announcement_id', $id)->update('announcement', $data);
		}


	}

