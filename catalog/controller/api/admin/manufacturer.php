<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/model/catalog/manufacturer.php";

class ControllerApiAdminManufacturer extends Controller {

    public function list(){
        $manufacturer = new ModelCatalogManufacturer($this->registry);
        $manufacturers = $manufacturer->getManufacturers();
        $this->response->setOutput(json_encode($manufacturers));
    }

    public function add(){
        $manufacturer = new ModelCatalogManufacturer($this->registry);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $input = $_REQUEST;
            $data = array(
                'name' => $input['name'],
                'image' => $input['image'],
                'manufacturer_store' => array($input['store']),
                // 'manufacturer_seo_url' => $input['seo_url'],
                'sort_order' => ''
            );
            $manufacturer->addManufacturer($data);
            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($data));
        }
    }
}