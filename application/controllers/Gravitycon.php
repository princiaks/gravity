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
	function __construct(){
		parent::__construct();
		$this->load->model('gravity_model');
	}
	public function index()
	{
		
        $this->load->view('header');
		$this->load->view('home');
        $this->load->view('footer');
	}
	public function gravity_upload()
	{
			$this->load->library('upload');
			$this->load->helper('form');
   			

			$data =array();
			$params=array('product_name','slug','sku','mrp','selling_price');
			$params2=array('thumb','prod');
			$params3=array('product_type','color_variants','size_variants','product_category');
			foreach($params as $param)
			{
				$data[$param]=$_POST[$param];
			}
			foreach($params2 as $param)
			{
				$data[$param]=$_FILES[$param];
			}

			foreach($params3 as $param)
			{
				$data[$param]=json_encode($_POST[$param]);
			}
			$data['product_id']= 'prod' . strtotime('now') .rand(0,9);
			if (!is_dir('uploads/'.$data['product_id'].'/default-thumbnails')) {
				mkdir('uploads/'.$data['product_id'].'/default-thumbnails', 0777, TRUE);
					   
			}
			if (!is_dir('uploads/'.$data['product_id'].'/product-images')) {
				mkdir('uploads/'.$data['product_id'].'/product-images', 0777, TRUE);
					 
			}
			$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
			$config['upload_path'] = 'uploads/'.$data['product_id'].'/default-thumbnails';
			$this->load->library('upload',$config);
			foreach($data['thumb'] as $thumb=>$value)
			{
				if($thumb=='name')
				{
					$namesplit = explode(".",$value);
					$value='def_img'.strtotime('now').rand(0,9);
					$value=$value.".".$namesplit[1];
				}
				$_FILES['file'][$thumb]=$value;
		
			}


			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			$uploadData=$this->upload->data();
			$data['default_thumbnail_url']=$uploadData['full_path'];
			$data['default_thumbnail_name']=$uploadData['file_name'];
			
			
			$config['upload_path'] = 'uploads/'.$data['product_id'].'/product-images';
			$this->load->library('upload',$config);
			
			$i=0;
			
			//echo $data['prod']['name'][0];
			$count=count($data['prod']['name']);
			for($i=0; $i<$count;$i++)
			{
			foreach($data['prod'] as $prod => $value)
			{
				$product[$i][$prod]=$value[$i];
				
					
			}
		} 
		$i=0;
		foreach($product as $prod)
		{
			$name=$prod['name'];
			$namesplit = explode(".",$name);
			$name = 'prod_img'.strtotime('now').rand(0,9);
			$name = $name.".".$namesplit[1];
			$_FILES['file']['name']=$name;
			$_FILES['file']['type']=$prod['type'];
			$_FILES['file']['tmp_name']=$prod['tmp_name'];
			$_FILES['file']['error']=$prod['error'];
			$_FILES['file']['size']=$prod['size'];

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			$uploadData=$this->upload->data();
			$data['prod_image_url'][$i]=$uploadData['full_path'];
			$data['prod_image_name'][$i]=$uploadData['file_name'];
			//print_r($uploadData);
			$i++;
					
		}
		$this->gravity_model->insert_product_details($data);
		$this->load->view('header');
		$data=array(
			'color_variants'=>$data['color_variants'],
			'size_variants'=>$data['size_variants'],
			'product_name'=>$data['product_name'],
			'sku'=>$data['sku'],
			'product_id'=>$data['product_id']
		);
		$this->load->view('product-stock-details',$data);
        $this->load->view('footer');
		

		/* $this->db->insert('product_details',$data);   */
   
		
	}
	public function gravity_colorvariants()
	{

	}
	public function gravityproduct_stock()
	{
		$data =array();
		$datatoview=array();
		$data['product_id']=$_POST['product_id'];
		$data['product_details']=$_POST['product_details'];
		
		$this->gravity_model->insert_product_stock_details($data);
		/* $data['stock_details']=$this->gravity_model->get_stock_details($data['product_id']); */
		$datatoview['product_id']=$data['product_id'];
		$datatoview['colors']=$this->gravity_model->get_product_colorvariants($data['product_id']);
		$this->load->view('header');
		$this->load->view('color-variants-upload',$datatoview);
		/* $this->load->view('view-product-stock-details',$data); */
        $this->load->view('footer');

	}
	
}
