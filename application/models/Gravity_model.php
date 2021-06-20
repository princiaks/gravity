<?php
class Gravity_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
               
        }
        public function insert_product_details($data=array())
        {
        
        $prodDetails_table_data['product_id']='prod' . strtotime('now') .rand(0,9);
        $prodDetails_table_data['slug']=url_title($data['slug'], 'dash', TRUE);
                $params=array('product_name','sku','mrp','selling_price','product_type','color_variants','size_variants','product_category');
                foreach($params as $param)
                {
                        $prodDetails_table_data[$param]=$data[$param];
                }
                $this->db->insert('product_master',$prodDetails_table_data);
                /*  $autoid = $this->db->insert_id(); */ //will do it later
                if($this->db->affected_rows() > 0)
                {
                        return $prodDetails_table_data['product_id'];
                }
    
        }


        public function insert_image_details($data=array())
        {     
                  
                $i=0;
                foreach($data['color'] as $color)
                {
                       $image_table_data=array(
                                'product_id'=>$data['product_id'],
                                'type'=>'default',
                                'color'=>$color,
                                'image_url'=>$data['thumbnailPath'][$i]

                        ); 
                        $this->db->insert('product_image_master',$image_table_data);
                       
                                $image_table_data['type']='prodimg';
                                $image_table_data['image_url'] = json_encode($data['prodimgPath'][$i]);
                         
                        $this->db->insert('product_image_master',$image_table_data);
                        $i++;
                }
        }
		
   
         public function insert_product_stock_details($data=array())
         {
                $product_id=$data['product_id'];
                $table_data=array();
                for($i=0;$i<count($data['product_details']['sku']);$i++)
                {
                foreach($data['product_details'] as $index=>$value)
                {       
                        
                        $table_data[$index]=$value[$i];  
                       
                }
                $table_data['product_id']=$product_id;
                $this->db->insert('product_stock_details',$table_data);

        }         
         }

         public function get_stock_details_list($product_id)
         {
                $this->db->select('mrp,selling_price');
                $this->db->from('product_master');
                if (!is_null($product_id)) $this->db->where('product_id', $product_id);
                $res=$this->db->get()->row();
                
                $query = $this->db->get_where('product_stock_details', array('product_id' => $product_id));
                $res1=$query->result();
                $result=array(
                        'p_master'=>$res,
                        'stock_det'=>$res1
                );
                return $result;
         }
         public function get_product_colorvariants($product_id)
         {
                $this->db->select('color_variants');
                $this->db->from('product_master');
                if (!is_null($product_id)) $this->db->where('product_id', $product_id);
                return $this->db->get()->row();
         }
         public function delete_from_stock($id)
         {
                $this->db->delete('product_stock_details', array('id' => $id)); 
                if($this->db->affected_rows()>0)
                {
                        return true;
                }
                else{
                        return false;
                }
         }
         public function get_product_names()
         {
                $query= $this->db->query("select product_id,product_name from product_master order by created_on limit 0,10");
                $result=$query->result_array();
                return $result;

         }
         public function get_product_images($product_id)
         {
                 $query=$this->db->query("SELECT type,color,image_url FROM `product_image_master` WHERE product_id='".$product_id."' GROUP by type,color");
                 $result['p_images']=$query->result_array();

                 $query=$this->db->query("SELECT product_name,product_category,product_type,mrp,selling_price,color_variants,size_variants FROM `product_master` WHERE product_id='".$product_id."'");
                 $result['p_master']=$query->result_array();

                 $query=$this->db->query("select color_variant,size_variant,stock,sku from product_stock_details WHERE product_id='".$product_id."' group by color_variant,size_variant");
                 $result['p_stock']=$query->result_array();

                 return $result;
                }
}