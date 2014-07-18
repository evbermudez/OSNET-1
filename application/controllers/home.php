<?php
class Home extends Admin_Controller {
  
	public function __construct() {
		parent::__construct();
		$this->load->model('user_m');
		$this->load->library('session');
	}
	
	/*
		Branch: MONIQUE-user_login_07/10/2014
		Created methods: index, login, login_validation, logout, home_page and sess_destroy
	*/
	
	
	public function index() {	
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else redirect('home/home_page');
	}
	
	public function login(){
		if($this->session->userdata('logged_in') == 1)
			redirect('home/home_page');			
        else $this->load->view('user/login');
    }
	
	public function login_validation() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$result = $this->user_m->user_exists($username, md5($password));
		
		if(!$result) {
				
			$data['login_error_message'] = "Invalid username or password,<br> please log in again.";
			$this->session->set_userdata('logged_in', 0);
			
			$this->load->view('user/login', $data);
		}
		else {
		
			foreach($result as $r)
				$user_id = $r->user_id;
				
			$result = $this->user_m->get_user_role($user_id);
			
			foreach($result as $r)
				$usertype = $r->usertype;
			
			$newdata = array(
				'username' => $username,
				'logged_in' => 1,
				'usertype' => $usertype
			);
			
			$this->session->set_userdata($newdata);
			redirect('home/home_page');
		}
	}
	
	/*
		BRANCH: SA FEEDBACK (sa regular user)
		Created method: feedback 
	*/
	
	public function feedback() {
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
			$data['features'] = $this->user_m->get_features($username);
			
			$this->load->view("templates/header");
			$this->load->view("templates/nav-sidebar");
			$this->load->view('user/feedback', $data);
			$this->load->view("templates/footer");
		}
	}
	
	
	/*
		BRANCH: SA FEEDBACK (sa superadmin)
		Created method: feedback 
	*/ 
	
	public function feedback_superadmin() {
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
			if($this->session->userdata('usertype') == 'superadmin') {
				$data['feedback'] = $this->user_m->get_feedback();
				
				$this->load->view("templates/header");
				$this->load->view("templates/nav-sidebar");
				$this->load->view('user/feedback_superadmin', $data);
				$this->load->view("templates/footer");
			}
			else echo "ERRER MESSAGE GOES HERE";
		}
	}
	
	
	public function create_feedback() {
		$data['username'] = $this->input->post('username');
		$data['subject'] = $this->input->post('subject');
		$data['feature_name'] = $this->input->post('feature');
		$data['text'] = $this->input->post('text');
		$data['date_created'] = date("Y-m-d H:i:s");
		$data['status'] = "pending";
		
		$this->user_m->insert_feedback($data);
		unset($data);
		
		$data['features'] = $this->user_m->get_features($username);
		
		redirect('home/feedback');
	}
	
	public function logout() {
		$this->sess_destroy();
		redirect('home/login');
	}
	
	public function home_page() { 
		// $this->load->view('home');
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
			$this->load->view("templates/header");
			$this->load->view("templates/nav-sidebar");
			$this->load->view("templates/footer");
		}
	}
	
	/*
		Branch: KEVIN-employee_list_module_07/14/2014 
		Created methods: render_profile_my_account, render_profile
	*/
	
	
	public function render_profile_my_account() {
		$sub_header_data["profile_active"] = "";
		$sub_header_data["my_account_active"] = "active";

		$this->load->view("templates/header");
		$this->load->view("templates/nav-sidebar");

		$this->load->view("profile/profile_sub_header_view", $sub_header_data);
		$this->load->view("profile/profile_my_account_view");
		$this->load->view("profile/profile_sub_footer_view");
		$this->load->view("templates/footer");
	}

	public function render_profile() {
		$sub_header_data["profile_active"] = "active";
		$sub_header_data["my_account_actve"] = "";

		$this->load->view("templates/header");
		$this->load->view("templates/nav-sidebar");

		$this->load->view("profile/profile_sub_header_view", $sub_header_data);
		$this->load->view("profile/profile_content_view");
		$this->load->view("profile/profile_sub_footer_view");
		$this->load->view("templates/footer");
	}
	
	/*
		Branch: KEVIN-department_list_module_07/14/2014 
		Created methods: render_department_list
	*/
	
	public function render_department_list() {
	if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
			$this->load->model('department_model');

			$view_data['title'] = "Department List";
			$view_data['department_list'] = $this->department_model->getAllDepartment();

			$this->load->view("templates/header");
			$this->load->view("templates/nav-sidebar");
			$this->load->view("department/dept_list_view", $view_data);
			$this->load->view("templates/footer");
		}
	}
	
	/*
		Branch: KEVIN-team_list_module_07/11/2014  
		Created methods: render_team_list
	*/
	
	public function render_team_list() {
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
			$this->load->model("team_model");

			$team_list_view_data["title"] = "Team List";
			$team_list_view_data["team_list"] = $this->team_model->getAllTeam();

			$this->load->view("templates/header");
			$this->load->view("templates/nav-sidebar");
			$this->load->view("team/team_list_view", $team_list_view_data);
			$this->load->view("templates/footer");
		}
	}
  
    /*
    ERIC-infractions
    Created methods: infraction_list,
  */
  
  public function infraction_list() {
		if($this->session->userdata('logged_in') == 0)
			redirect('home/login');
		else {
			$this->load->model("infraction_m");

			$data["title"] = "Infraction List";
      $data["infraction_type"] = $this->infraction_m->getInfractionType();
			$data["infraction_list"] = $this->infraction_m->getInfractionList();
			

			$this->load->view("templates/header");
			$this->load->view("templates/nav-sidebar");
			$this->load->view("infraction/infraction_list", $data);
			$this->load->view("templates/footer");
		}
	}
	
	/* ********************************************** */
	public function modal() {
		$this->load->view('_layout_modal');
	}
	
	private function sess_destroy() {
		$this->session->sess_destroy();
	}
}