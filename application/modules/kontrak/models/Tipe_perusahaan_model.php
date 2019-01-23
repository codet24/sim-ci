<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tipe_perusahaan_model extends MY_Model
    {

		protected $table_name        = 'tipe_perusahaan';
		protected $key               = 'tipe_perusahaan_id';
		protected $set_created       = TRUE;
		protected $created_field     = 'created_on';
		protected $created_by_field  = 'created_by';

		protected $set_modified      = TRUE;
		protected $modified_field    = 'modified_on';
		protected $modified_by_field = 'modified_by';
		protected $soft_deletes      = TRUE;
		protected $date_format       = 'datetime';

        //---------------------------------------------------------------


        public function get_all_tipe_perusahaan()
        {
        	$data = $this->where('deleted',0)->find_all();
        	$output = array();
        	 if (empty($data)){
	            	$output['data']=array("-","-","-","-");

	       	 }else{
	        foreach ($data as $row) {
	            $array = array();
	            $array[] = $row->tipe_perusahaan_id;
	            $array[] = $row->nama_tipe_perusahaan;
	            $array[] = $row->ket;
	            // $array[] = "<button type='button' class='btn waves-effect waves-light btn-xs btn-info'>Tiny .btn-xs</button>";
	            $array[] = '<a class="edit btn waves-effect waves-light btn-xs btn-info" data-id="'.$row->tipe_perusahaan_id.'" style="color:#FFF;"><i class="fa fa-edit"></i> Edit</a>
	            				<a class="delete btn waves-effect waves-light btn-xs btn-danger" data-id="'.$row->tipe_perusahaan_id.'" style="color:#FFF;"><i class="fa fa-trash-o"></i> Hapus</a> ';

	            $output['data'][] = $array;


	        }
	    }


	        return $output;
        }

        public function get_option_select()
        {
        	$data = $this->where('deleted',0)->find_all();
        	$output = array();

        	foreach ($data as $row) {
        		$output[$row->tipe_perusahaan_id]=$row->nama_tipe_perusahaan;
        	}
        	return $output;
        }

    }
