<?php defined('BASEPATH') || exit('No direct script access allowed');


class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        Assets::add_module_js('kontrak', 'js_user.js');
    }

    //---------------------------------------------URL
    public function index()
    {
        // $list    = $this->user_model->get_option_select();
        Template::render();
    }


    //---------------------------------------------AJAx
    public function listener_show_all()
    {
        $data = $this->user_model->get_all_user();
        echo json_encode($data);
    }

    public function get_user()
    {
        $output = $this->user_model->find($this->input->post('id'));
        header('Content-Type: application/json');
        echo json_encode($output);
    }

    //--------------------------------------------CRUD
    public function save()
    {
        $data = array(

            'nama_user'      => $this->input->post('nama_user'),
            'tipe_user_id'      => $this->input->post('tipe_user_id'),
            'ket'     => $this->input->post('ket'),
            'created_by' => 1 ,
            'created_on' => date('Y-m-d h:i:s'),
        );
        $result = array();

        if (!$this->input->post('id')) {
            $result['type'] = 'insert';
            $save = $this->user_model->insert($data);
            if ($save) {
                $result['status'] = 'success';
                $result['msg']    = 'user baru berhasil disimpan!';


            }else{
                $result['status'] = 'error';
                $result['msg']    = $this->db->error_message();
            }
        }else{
            $result['type'] = 'update';
            $save = $this->user_model->update($this->input->post('id'),$data);
            if ($save) {
                $result['status'] = 'success';
                $result['msg']    = 'user diperbarui!';


            }else{
                $result['status'] = 'error';
                $result['msg']    = $this->db->error_message();
            }
        }
        header('Content-Type: application/json');
        echo  json_encode($result);
    }

    public function delete()
    {
        $delete = $this->user_model->delete($this->input->post('id'));
        if ($delete) {
            $result['status'] = 'success';
            $result['msg']    = 'user Berhasil dihapus!';
        }else{
            $result['status'] = 'error';
            $result['msg']    = 'user gagal dihapus!';
        }
        header('Content-Type: application/json');
        echo  json_encode($result);
    }
}
/* End of file user_controller.php */
