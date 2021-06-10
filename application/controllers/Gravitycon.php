<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gravitycon extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->view('header');
		$this->load->view('home');
        $this->load->view('footer');
	}
	public function gravity_upload()
	{
		echo"hjgdhfh";
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$this->load->library('upload');
			$this->load->helper('form');
   			$this->load->library('form_validation');

			   	$this->form_validation->set_rules('product_name', 'product_name', 'required');
    			$this->form_validation->set_rules('slug', 'slug', 'required');
				$this->form_validation->set_rules('sku', 'sku', 'required');
    			$this->form_validation->set_rules('product_category', 'product_category', 'required');
				$this->form_validation->set_rules('mrp', 'mrp', 'required');
    			$this->form_validation->set_rules('selling_price', 'selling_price', 'required');
				$this->form_validation->set_rules('product_type', 'product_type', 'required');
    			$this->form_validation->set_rules('color_variants', 'color_variants', 'required');
				$this->form_validation->set_rules('size_variants', 'size_variants', 'required');

				if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');

    }
    else
    {
        $this->gravity_model->insert_product_details();
        $this->load->view('news/success');
    }
			/* $config=array(
'upload_path' => FCPATH.'asset/images/',
'allowed_types' =>"png|jpeg|jpg|JPG|JPEG|bmp|PNG",
'max_size'=> "26200"
			);
			$this->upload->initialize($config); */
		}
	}
}
