<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth
{
    /**
     *    @author K.Gautam
     *    @version 0.1
     *    @todo ability to add configuration.
     */
    protected $CI = null;

    /**
     *    Get CodeIgniter Instance and
     *    Load necessary libraries
     */
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    /**
     *    Start the session and set session variables.
     *    @param email address of the user to store on the session
     */
    public function login_user($email)
    {
        $this->CI->session->set_userdata(array(
            'email_address' => $email_address,
            'logged_in' => true,
        ));
    }

    /**
     *    Logout user by deleting session information
     */
    public function logout_user()
    {
        /*
        Logout user by unsetting the data
         */
        $this->CI->session->unset_userdata('email_address');
        $this->CI->session->unset_userdata('logged_in');
    }

    /**
     *    check if the user is logged in
     *    @return TRUE if data is available and the user is logged in
     *            else if data is not available it by default returns false
     */
    public function is_logged_in()
    {
        return $this->CI->session->userdata("logged_in");
    }

}
