<?php defined('BASEPATH') || exit('No direct script access allowed');


class Tipe_perusahaan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tipe_perusahaan_model');
        Assets::add_module_js('kontrak', 'js_tipe_perusahaan.js');
    }

    //---------------------------------------------URL
    public function index()
    {
        Template::render();
    }


    //---------------------------------------------AJAx
    public function listener_show_all()
    {
        $data = $this->tipe_perusahaan_model->get_all_tipe_perusahaan();
        echo json_encode($data);
    }

    public function get_tipe_perusahaan()
    {
        $output = $this->tipe_perusahaan_model->find($this->input->post('id'));
        header('Content-Type: application/json');
        echo json_encode($output);
    }

    //--------------------------------------------CRUD
    public function save()
    {
        $data = array(

            'nama_tipe_perusahaan'      => $this->input->post('nama_tipe_perusahaan'),
            'ket'     => $this->input->post('ket'),
            'created_by' => 1 ,
            'created_on' => date('Y-m-d h:i:s'),
        );
        $result = array();

        if (!$this->input->post('id')) {
            $result['type'] = 'insert';
            $save = $this->tipe_perusahaan_model->insert($data);
            if ($save) {
                $result['status'] = 'success';
                $result['heading'] = 'Selamat Proses Berhasil';
                $result['msg']    = 'Tipe Perusahaan baru berhasil disimpan!';


            }else{
                $result['status'] = 'error';
                $result['heading'] = 'Terjadi Kesalahan';
                $result['msg']    = $this->db->error_message();
            }
        }else{
            $result['type'] = 'update';
            $save = $this->tipe_perusahaan_model->update($this->input->post('id'),$data);
            if ($save) {
                $result['status'] = 'success';
                $result['heading'] = 'Selamat Proses Berhasil';
                $result['msg']    = 'Tipe Perusahaan diperbarui!';


            }else{
                $result['status'] = 'error';
                $result['heading'] = 'Terjadi Kesalahan';
                $result['msg']    = $this->db->error_message();
            }
        }
        header('Content-Type: application/json');
        echo  json_encode($result);
    }

    public function delete()
    {
        $delete = $this->tipe_perusahaan_model->delete($this->input->post('id'));
        if ($delete) {
            $result['status'] = 'success';
            $result['heading'] = 'Selamat Proses Berhasil';
            $result['msg']    = 'Tipe Perusahaan Berhasil dihapus!';
        }else{
            $result['status'] = 'error';
            $result['heading'] = 'Terjadi Kesalahan';
            $result['msg']    = 'Tipe Perusahaan gagal dihapus!';
        }
        header('Content-Type: application/json');
        echo  json_encode($result);
    }
}
/* End of file tipe_perusahaan_controller.php */
