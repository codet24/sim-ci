<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Admin Controller
 *
 * This class provides a base class for all admin-facing controllers.
 * It automatically loads the form, form_validation and pagination
 * helpers/libraries, sets defaults for pagination and sets our
 * Admin Theme.
 *
 * @package    Bonfire
 * @subpackage MY_Controller
 * @category   Controllers
 * @author     Bonfire Dev Team
 * @link       http://guides.cibonfire.com/helpers/file_helpers.html
 *
 */
class Member_Controller extends Authenticated_Controller
{
    //--------------------------------------------------------------------

    /**
     * Class constructor - setup paging and keyboard shortcuts as well as
     * load various libraries
     *
     */
    public function __construct()
    {
        $this->autoload['libraries'][] = 'ui/contexts';

        parent::__construct();

        Template::set_theme('landingpage');
        date_default_timezone_set("Asia/Jakarta");
    }

    //Generate Pengkodean

    public function generate_nomor($kode = '')
    {
        $this->load->model('super/pengkodean_model');
        $data = $this->pengkodean_model->find_by('kode', $kode);
        if (!$data) {
            return false;
        }
        $nomor = $data->unik;
        $nomor++;

        $Y = date('Y');
        $M = date('m');

        $kode_generate =  $kode.'/'.$Y.'/'.$M.'/'.str_pad($nomor, 6, 0,0);

        $this->pengkodean_model->update($data->id,array('unik'=> $nomor));

        return $kode_generate;
    }
    
    //End Generate Pengkodean

}
/* End of file Admin_Controller.php */
