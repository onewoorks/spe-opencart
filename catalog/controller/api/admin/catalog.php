<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/model/catalog/category.php";

class ControllerApiAdminCatalog extends Controller {
    public function index() {
        $this->load->model('catalog/category');
        $this->model_catalog_category->getTotalCategories();
        $results = $this->model_catalog_category->getCategories();
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($results));
        
    }

    public function testcall(){
        $filter_data = array();
        $category = new ModelCatalogCategory($this->registry);
        $categories = $category->getCategories($filter_data);
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($categories));
    }
}