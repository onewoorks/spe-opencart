<?php

class ControllerApiCatalog extends Controller {
    public function category() {
        $this->load->model('catalog/category');
        $category_total = $this->model_catalog_category->getTotalCategories();
        $results = $this->model_catalog_category->getCategories();
        echo json_encode($results);
    }
}