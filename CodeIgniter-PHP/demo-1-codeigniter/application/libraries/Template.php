<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	
	var $CI;
	
	/**
	 * Template Constructor
	 *
	 * @access	public
	 */
	function Template()
	{
        // Get CodeIgniter instance
		$this->CI =& get_instance();
    }

	/**
	 * Display the final view to browser
	 *
	 * @access	public
	 * @param	string	view
	 * @param	mixed	data
	 * @param	string	content template
	 * @param	bool	return
	 * @return	parsed view
	 */
	function display($view, $data = array(), $content_template = 'panel/general', $return = FALSE)
	{		
	
		$data['content'] 			= $this->CI->load->view($view, $data, TRUE);
		$data['content_template']	= $content_template;
        
        return $this->CI->load->view('panel/template', $data, $return);

	}

}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */