<?php
defined('BASEPATH') || exit('No direct script access allowed');
class Kontrak extends MY_Controller

{
    public

    function __construct()
    {
        parent::__construct();
        Assets::add_module_js('kontrak', 'js_kontrak.js');

        // $this->auth->restrict('Super');

    }

    // ---------------------------------------------URL

    public

    function index()
    {

        // $this->auth->restrict('Member.AdminPesantren');
        Template::render();
    }

    // public function send_mail($id = 0, $email = '')
    // {
    //     $this->load->library('email');
    //     $config = Array(
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'mail.pesantrenin.com',
    //         'smtp_port' => '587',
    //         'smtp_user' => 'system@pesantrenin.com',
    //         'smtp_pass' => 'supertim2018',
    //         'mailtype' => 'html',
    //         'charset' => 'iso-8859-1'
    //     );
    //     $this->email->initialize($config);
    //     $this->email->from('system@pesantrenin.com', 'System Pesantrenin');
    //     $this->email->to('aexsa24@gmail.com');
    //     $this->email->set_mailtype('html');
    //     // $data = $this->pos_model->get_detail_penjualan($id);
    //     // $body = $this->load->view('email', $data, true);
    //     $body = 'contoh kirim email';
    //     $this->email->subject('Transaksi ' . date('Y-m-d'));
    //     $this->email->message($body);
    //     $this->email->send();
    // }

}

/* End of file Cabang_controller.php */
