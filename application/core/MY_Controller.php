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
class MY_Controller extends Authenticated_Controller
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

        Template::set_theme('adminpress');
        date_default_timezone_set("Asia/Jakarta");
    }



}
/* End of file Admin_Controller.php */
