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
	public function do_upload_process($imgdata,$product_id)
	{	
		$this->load->library('upload');
		
			if (!is_dir('uploads/'.$product_id.'/default-thumbnails')) {
				mkdir('uploads/'.$product_id.'/default-thumbnails', 0777, TRUE);
					   
			}
			if (!is_dir('uploads/'.$product_id.'/product-images')) {
				mkdir('uploads/'.$product_id.'/product-images', 0777, TRUE);
					 
			}
			$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
			$config['upload_path'] = 'uploads/'.$product_id.'/default-thumbnails';
			$this->load->library('upload',$config);
			$count=count($imgdata['thumbnail']['name']);
			
			for($i=0;$i<$count;$i++)
			{
			foreach($imgdata['thumbnail'] as $thumb=>$value)
			{
				
				if($thumb=='name')
				{
					$namesplit = explode(".",$value[$i]);
					$value[$i]='def_img'.strtotime('now').rand(0,9);
					$value[$i]=$value[$i].".".$namesplit[1];
				}
				$_FILES['file'][$thumb]=$value[$i];
		
			}

			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			$uploadData=$this->upload->data();
			$thumb_filepath[$i]=base_url().'uploads/'.$product_id.'/default-images/'.$uploadData['file_name'];

		}
		
			$config['upload_path'] = 'uploads/'.$product_id.'/product-images';
			$this->load->library('upload',$config);
			$count1=count($imgdata['prodimg']['name']);
			
			
			for($j=0;$j<$count1;$j++)
			{
			$count=count($imgdata['prodimg']['name'][$j]);
			for($i=0; $i<$count;$i++)
			{
			foreach($imgdata['prodimg'] as $prod => $value)
			{
			
				$product[$prod]=$value[$j][$i];		
			
			}
			$name=$product['name'];
			$namesplit = explode(".",$name);
			$name = 'prod_img'.strtotime('now').rand(0,9);
			$name = $name.".".$namesplit[1];
			$_FILES['file']['name']=$name;
			$_FILES['file']['type']=$product['type'];
			$_FILES['file']['tmp_name']=$product['tmp_name'];
			$_FILES['file']['error']=$product['error'];
			$_FILES['file']['size']=$product['size'];
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->upload->do_upload('file');
			$uploadData=$this->upload->data();
			$prod_filepath[$j][$i]=base_url().'uploads/'.$product_id.'/product-images/'.$uploadData['file_name'];
			} 
		}
		
			$upload_data=array(
				'thumbnailPath'=>$thumb_filepath,
				'prodimgPath'=>$prod_filepath
			);
			
			return $upload_data;
	}
	public function gravity_upload()
	{
			$this->load->helper('form');
   			

			$data =array();
			$params=array('product_name','slug','sku','mrp','selling_price');
			
			$params2=array('product_type','color_variants','size_variants','product_category');
			foreach($params as $param)
			{
				$data[$param]=$_POST[$param];
			}
			foreach($params2 as $param)
			{
				$data[$param]=json_encode($_POST[$param]);
			}

			$product_id=$this->gravity_model->insert_product_details($data);
			 
			$imgdata['thumbnail']=$_FILES['thumbnail'];
			$imgdata['prodimg']=$_FILES['prodimg'];

			
			$upload_data=$this->do_upload_process($imgdata,$product_id);
			$upload_data['color'][0]='primary';
			$upload_data['product_id']=$product_id;
			$this->gravity_model->insert_image_details($upload_data);
			
			$this->load->view('header');
			$data=array(
			'color_variants'=>$data['color_variants'],
			'size_variants'=>$data['size_variants'],
			'product_name'=>$data['product_name'],
			'sku'=>$data['sku'],
			'product_id'=>$product_id
			);
			$this->load->view('product-stock-details',$data);
        	$this->load->view('footer');
		
	}
	public function gravity_colorvariants()
	{
		$data=array();
		$imgdata=array();
		$product_id=$_POST['product_id'];
		
		$imgdata['thumbnail']=$_FILES['thumbnail'];
		$imgdata['prodimg']=$_FILES['prodimg'];

		$upload_data=$this->do_upload_process($imgdata,$product_id);
		$upload_data['color']=$_POST['color_name'];
		$upload_data['product_id']=$product_id;
		
		$this->gravity_model->insert_image_details($upload_data);

		
		
		exit;
		


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
