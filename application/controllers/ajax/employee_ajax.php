<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_ajax extends CI_Controller {

  public function ajax_employee_search_by_department() {
    $employee = $this->input->post("employee");
    $department = $this->input->post("department");

    $this->load->model("employee_model");

    $search_result = $this->employee_model->get_employee_by_department($employee, $department);

    //print_r($search_result);

    foreach($search_result as $result) {
      echo "<tr>";
        echo "<td>". $result->first_name . ' '. $result->middle_name. ' ' . $result->last_name ."</td>";
        echo "<td>". $result->department ."</td>";
        echo "<td>". $result->email ."</td>";
        echo "<td>";
          echo "<a id='edit' class=". $result->user_id ." href='#'><img src=". site_url("assets/img/edit.gif") ."></a>";
          echo "<a id='archieve' class=". $result->user_id ." href='#'><img src=". site_url("assets/img/delete.gif") ."></a>";
        echo "</td>";
      echo "</tr>";
    }
  }
  
  public function ajax_add_new_employee() {
    $this->load->model("employee_model");

    $profile = $this->input->post("profile");

    $profile_data = json_decode($profile, true);

    unset($profile_data["add-new-employee"]);
    unset($profile_data[""]);
    unset($profile_data["search"]);

    $test = array("one" => 1, "two" => 2);

    $this->employee_model->addNewEmployee($profile_data);
  }
}