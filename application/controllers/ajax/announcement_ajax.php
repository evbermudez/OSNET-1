<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement_ajax extends CI_Controller {

	/*
		Branch: JEFFREY-announcements_table_db_change_07/11/2014
		Added:  whole announcement_ajax.php    
		*/
		
	public function view() {
		$this->load->model("announcement_m");
		$id=$_POST['row_id'];
		$data = $this->announcement_m->get_announcement($id);
		
		$start = date('M d, Y', strtotime($data[0]['duration_start']));
		$end = date('M d, Y', strtotime($data[0]['duration_end']));
		
		echo 
		'<h4 >' . $data[0]['announcement_title'] . '</h4>
		<i class="duration">' . $start . ' - ' . $end . '</i>
		<div class="announcement">' . $data[0]['announcement_message'] . '</div>';
	}
	
	public function add(){
		$this->load->model("announcement_m");
		$title = $_POST['title'];
		$duration = $_POST['duration'];
		$message = $_POST['message'];
		$id = $_POST['id'];
		$this->announcement_m->save_announcement($title, $duration, $message, $id);
	
	}
	
	public function edit(){
		$this->load->model("announcement_m");
		$id=$_POST['row_id'];
		
		$data = $this->announcement_m->get_announcement($id);
		
		$start = date('m/d/Y', strtotime($data[0]['duration_start']));
		$end = date('m/d/Y', strtotime($data[0]['duration_end']));
		
		$result['announcement_title'] = $data[0]['announcement_title'];
		$result['announcement_duration'] = $start . ' - ' . $end;
		$result['announcement_message'] = $data[0]['announcement_message'];
		echo json_encode($result);
	}
	
	public function delete(){
		$this->load->model("announcement_m");
		$id=$_POST['row_id'];
		
		$this->announcement_m->archive_announcement($id);
	}
   
}
 