<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'helpers/jwt_helper.php';

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'user_model',
        ]);
    }

    public function index()
    {
        // Mendapatkan token dari header Authorization
        $token = getTokenFromHeaders();

        if ($token == "") {
            redirect("login", "refresh");
        }

        // Memeriksa apakah token valid
        try {
            $payload = jwt_decode($token, 'jakadwi_p');
            
        } catch (Exception $e) {
            $this->output->set_status_header(401);
            $response = [
                'status' => false,
                'message' => 'Invalid token'
            ];
            redirect("login", "refresh");
            // $this->output->set_content_type('application/json')->set_output(json_encode($response));
            // return;
        }

        // Memeriksa apakah pengguna ada di dalam database
        $user = $this->user_model->getUserById($payload->sub->sub);
        
        if (!$user) {
            $this->output->set_status_header(401);
            $response = [
                'status' => false,
                'message' => 'Invalid token'
            ];
            // $this->output->set_content_type('application/json')->set_output(json_encode($response));
            // return;
        }

        // Jika token valid, kirimkan respon
        $response = [
            'status' => true,
            'message' => 'Welcome ' . $user['username']
        ];

        $data["data"] = $response;
        $data["dt_user"] = $this->user_model->getData();
        $this->load->view("user", $data);
        // $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
