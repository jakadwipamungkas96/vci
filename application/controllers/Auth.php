<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'helpers/jwt_helper.php';

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view("login");
    }

    public function setFlasher($type, $message)
	{
		$flash = '<div class="alert alert-' . $type . '" role="alert">
        ' . $message . ' </div>';
		return $this->session->set_flashdata('message', $flash);
	}

    public function login()
    {
        // Mengambil data dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Memeriksa apakah pengguna dengan username yang diberikan ada di dalam database
        $user = $this->user_model->getUserByUsername($username);
        if (!$user) {
            $this->output->set_status_header(401);
            $response = [
                'status' => false,
                'message' => 'Invalid username or password'
            ];
            $this->setFlasher('danger', 'Invalid username or password');
            redirect("login");
            // $this->output->set_content_type('application/json')->set_output(json_encode($response));
            // return;
        }

        // Memeriksa apakah password yang diberikan cocok dengan hash password di database
        if (!password_verify($password, $user['password'])) {
            $this->output->set_status_header(401);
            $response = [
                'status' => false,
                'message' => 'Invalid username or password'
            ];
            $this->setFlasher('danger', 'Invalid username or password');
            redirect("login");
            // $this->output->set_content_type('application/json')->set_output(json_encode($response));
            // return;
        }

        // Jika username dan password cocok, maka buat token JWT
        $payload = [
            'sub' => $user['id'],
            'iat' => time(),
            'exp' => time() + 60 * 60 // token akan kadaluarsa dalam 1 jam
        ];
        $token = jwt_encode($payload, 'jakadwi_p');

        // Kirim token sebagai respon
        $response = [
            'status' => true,
            'token' => $token
        ];

        $data = [
            "userid"    => $user["username"],
            "email"     => $user["email"],
            "token"     => $token
        ];
        $this->session->set_userdata($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
        redirect("home");
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
		$this->session->unset_userdata('token');
        $this->setFlasher('info', 'You successfull Logout');
        redirect("login");
    }
}
