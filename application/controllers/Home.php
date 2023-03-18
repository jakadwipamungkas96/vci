<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'helpers/jwt_helper.php';

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        // Mendapatkan token dari header Authorization
        $token = getTokenFromHeaders();

        // Memeriksa apakah token valid
        try {
            $payload = jwt_decode($token, 'jakadwi_p');
            
        } catch (Exception $e) {
            $this->output->set_status_header(401);
            $response = [
                'status' => false,
                'message' => 'Invalid token'
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
            return;
        }

        // Memeriksa apakah pengguna ada di dalam database
        $user = $this->user_model->getUserById($payload->sub->sub);
        
        if (!$user) {
            $this->output->set_status_header(401);
            $response = [
                'status' => false,
                'message' => 'Invalid token'
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
            return;
        }

        // Jika token valid, kirimkan respon
        $response = [
            'status' => true,
            'message' => 'Welcome ' . $user['username']
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
