<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infractions_ajax extends CI_Controller {

  public function add() {
    
    $this->load->model('infraction_m');
    
    $user_id= $_POST['user_id'];
    $infraction_type= $_POST['infraction_type'];
    $date = $_POST['date'];
    $details = $_POST['details'];
    
    $this->infraction_m->save_infraction($user_id, $infraction_type, $date, $details);
    
  }

}