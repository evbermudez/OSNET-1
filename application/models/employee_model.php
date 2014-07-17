<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {

  public function get_employee_by_department($employee, $department) {
    $employee = $this->db->escape_str($employee);
    $department = $this->db->escape_str($department);

    $search_key = "%";
    $search_key .= $employee;
    $search_key .= "%";

    $query = null;

    if ($department !== "All") {
      //$where = "department='$department' AND ";
      $query = 
        "SELECT *
        FROM user_information
        WHERE department='$department' AND
        full_name LIKE '$search_key'";
    } else {
      //$where = "";
      $query = 
        "SELECT *
        FROM user_information
        WHERE full_name
        LIKE '$search_key'";
    }

    /*
    $query = 
      "SELECT *
      FROM user_information 
      WHERE {$where}
      full_name LIKE '$search_key'"; */

    $result = $this->db->query($query);

    return $result->result();
  }

  public function getAllEmployee() {
    $query = 
      "SELECT *
      FROM user_information";

    $result = $this->db->query($query);

    return $result->result();
  }

  public function addNewEmployee(array $employee_information) {
    $si = array();

    foreach($employee_information as $key => $value) {
      $si[$key] = $this->db->escape_str($value);
    }

    $this->db->insert("user_information", $si);
  }
}