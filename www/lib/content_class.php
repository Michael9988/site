<?php

require_once "modules_class.php";

class Content extends Modules {

    protected $title = "Интернет-магазин";
    protected $meta_desc = "Интернет-магазин по продаже DVD-Дисков";
    protected $meta_key = "Интернет-магазин, dvd";

    protected function getContent() {
        $this->template->set("table_products_title", "Новинки");
        $this->template->set("products", $this->product->getAllData($this->config->count_on_page));
        return "index";
    }

}
?>

