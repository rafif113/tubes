<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notfound extends CI_Controller {

    public function index() {
        $this->output->set_status_header('404'); // setting header to 404
        $this->load->view('view_notfound');//loading view
    }
}
