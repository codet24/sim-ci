<?php defined('BASEPATH') || exit('No direct script access allowed');


class Perusahaan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('perusahaan_model');
        $this->load->model('tipe_perusahaan_model');
        Assets::add_module_js('kontrak', 'js_perusahaan.js');
    }

    //---------------------------------------------URL
    public function index()
    {
        $data=$this->tipe_perusahaan_model->get_option_select();
        Template::set('list_tipe_perusahaan',$data);
        Template::render();
    }


    //---------------------------------------------AJAx
    public function listener_show_all()
    {
        $data = $this->perusahaan_model->get_all_perusahaan();
        echo json_encode($data);
    }

    public function get_perusahaan()
    {
        $output = $this->perusahaan_model->get_perusahaan($this->input->post('id'));
        echo json_encode($output);
    }

    //--------------------------------------------CRUD
    public function save()
    {
        $data = array(

            'nama_perusahaan'      => $this->input->post('nama_perusahaan'),
            'tipe_perusahaan_id'      => $this->input->post('tipe_perusahaan_id'),
            'alamat'      => $this->input->post('alamat'),
            'ket'     => '-',
            'created_by' => 1 ,
            'created_on' => date('Y-m-d h:i:s'),
        );
        $result = array();

        if (!$this->input->post('id')) {
            $result['type'] = 'insert';
            $save = $this->perusahaan_model->insert($data);
            if ($save) {
                $result['status'] = 'success';
                $result['heading'] = 'Selamat Proses Berhasil';
                $result['msg']    = 'Perusahaan baru berhasil disimpan!';


            }else{
                $result['status'] = 'error';
                $result['heading'] = 'Terjadi Kesalahan';
                $result['msg']    = $this->db->error_message();
            }
        }else{
            $result['type'] = 'update';
            $save = $this->perusahaan_model->update($this->input->post('id'),$data);
            if ($save) {
                $result['status'] = 'success';
                $result['heading'] = 'Selamat Proses Berhasil';
                $result['msg']    = 'Perusahaan diperbarui!';


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
        $delete = $this->perusahaan_model->delete($this->input->post('id'));
        if ($delete) {
            $result['status'] = 'success';
            $result['heading'] = 'Selamat Proses Berhasil';
            $result['msg']    = 'Perusahaan Berhasil dihapus!';
        }else{
            $result['status'] = 'error';
            $result['heading'] = 'Terjadi Kesalahan';
            $result['msg']    = 'Perusahaan gagal dihapus!';
        }
        header('Content-Type: application/json');
        echo  json_encode($result);
    }

}
/* End of file perusahaan_controller.php */
