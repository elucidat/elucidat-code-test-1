<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Code test controller. Gets a set of pages from a (fake) database and returns it for the user
	 * 
	 * @return	null
	 * @todo The page should implement some form of filter or display choice, and show the data in an interesting way
	 * @todo Documentation is important!
	 * @todo See the view for more instructions
	 */
	public function index()
	{	
		// load the page model
		$this->load->model('page_model');
		// put the data in a useful for the view
		$page_data = array(
			'pages' => $this->page_model->get_pages()
		);
		// and load the view
		$this->load->view('pages_view', $page_data);
	}
}
