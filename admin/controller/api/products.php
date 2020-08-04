<?php 
class ControllerApiProducts extends Controller {
    public function index(){
        $this->load->model('catalog/product');

        $filter_data = array(
			// 'filter_name'     => $filter_name,
			'filter_model'    => 'Product 15',
			// 'filter_price'    => $filter_price,
			// 'filter_quantity' => $filter_quantity,
			// 'filter_status'   => $filter_status,
			// 'sort'            => $sort,
			// 'order'           => $order,
			// 'start'           => ($page - 1) * $this->config->get('config_pagination'),
			// 'limit'           => $this->config->get('config_pagination')
        );
        
        $results = $this->model_catalog_product->getProducts($filter_data);
        $products = array();
        foreach($results as $result){
            $result['name'] = $result['name'];
            $products[] = $result;
        }
        echo htmlspecialchars(json_encode($products), ENT_QUOTES, 'UTF-8');
    }
}