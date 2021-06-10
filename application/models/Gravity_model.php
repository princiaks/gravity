<?php
class Gravity_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
               /*  $this->tableName='product_details'; */
        }
        public function insert_product_details($data=array())
        {
    
     $sucesss = true;
     $multiple_tables_affected = true; //up_user and up_add_user
     $params=array('product_id', 'default_thumbnail_url','default_thumbnail_name');
     foreach($params as $param)
     {
        $def_table_data[$param]=$data[$param];
     }
     $def_table_data['color']='default';

        $this->db->insert('default_images', $def_table_data);
        $data['default_img_id'] = $this->db->insert_id();
        $count=count($data['prod_image_url']);
        $params=array('product_id', 'default_img_id');
        for($i=0 ; $i< $count; $i++)
        {
                foreach($params as $param)
                {
                 $prodimg_table_data[$param]=$data[$param];
                }
                $prodimg_table_data['prod_image_url']=$data['prod_image_url'][$i];
                $prodimg_table_data['prod_image_name']=$data['prod_image_name'][$i];

                $this->db->insert('product_images',$prodimg_table_data);
        }
        $prodDetails_table_data['default_thumbnail_url']=$data['default_thumbnail_url'];
        $prodDetails_table_data['default_thumbnail_name']=$data['default_thumbnail_name'];
        $prodDetails_table_data['slug']=url_title($data['slug'], 'dash', TRUE);
     $params=array('product_id','product_name','sku','mrp','selling_price','product_type','color_variants','size_variants','product_category');
     foreach($params as $param)
     {
             $prodDetails_table_data[$param]=$data[$param];
     }
     $this->db->insert('product_details',$prodDetails_table_data);
        }

		
         public function get_product_details()
         {
               /*  $query = $this->db->query("select color_variants from product_details");

                $row = $query->row(); */
         }
}