<?php
class Gravity_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function insert_product_details()
        {
        $this->load->helper('url');

        $slug = url_title($this->input->post('slug'), 'dash', TRUE);

        $data = array(
        'product_name' => $this->input->post('product_name'),
        'slug' => $slug,
        'sku' => $this->input->post('sku'),
        'product_category' => $this->input->post('product_category'),
        'mrp' => $this->input->post('mrp'),
        'selling_price' => $this->input->post('selling_price'),
        'product_type' => $this->input->post('product_type'),
        'color_variants' => $this->input->post('color_variants'),
        'size_variants' => $this->input->post('size_variants')
        );

        return $this->db->insert('product_details', $data);
        }
}