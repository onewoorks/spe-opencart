<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/model/catalog/product.php";

class ControllerApiAdminProduct extends Controller {
    public function index(){
        $this->load->model('catalog/product');

        $filter_data = array(
			// 'filter_name'     => $filter_name,
			// 'filter_model'    => 'Product 15',
			// 'filter_price'    => $filter_price,
			// 'filter_quantity' => $filter_quantity,
			// 'filter_status'   => $filter_status,
			// 'sort'            => $sort,
			// 'order'           => $order,
			// 'start'           => ($page - 1) * $this->config->get('config_pagination'),
			// 'limit'           => $this->config->get('config_pagination')
        );

        $results = $this->model_catalog_product->getProducts($filter_data);
        $json =  htmlspecialchars(json_encode($results), ENT_QUOTES, 'UTF-8');
        $this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($results));
    }

    public function add(){
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode(array("test","ok")));
    }

    public function testcall(){
        $filter_data = array();
        $product = new ModelCatalogProduct($this->registry);
        $products = $product->getProducts($filter_data);
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($products));
    }
}