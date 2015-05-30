<?php

require_once "config_class.php";
require_once "url_class.php";
require_once "format_class.php";
require_once "template_class.php";
require_once "section_class.php";
require_once "product_class.php";

abstract class Modules {

    protected $config;
    protected $data;
    protected $url;
    protected $format;
    protected $section;
    protected $product;

    public function __construct() {
        session_start();
        $this->config = new Config();
        $this->url = new URL();
        $this->format = new Format();
        $this->data = $this->format->xss($_REQUEST);
        $this->template = new Template($this->config->dir_tmpl);
        $this->section = new Section();
        $this->product = new Product();
        
        $this->template->set("title", $this->title);
        $this->template->set("meta_desc", $this->meta_desc);
        $this->template->set("meta_key", $this->meta_key);
        $this->template->set("index", $this->url->index());
        $this->template->set("link_delivery", $this->url->delivery());
        $this->template->set("cart_link", $this->url->cart());
        $this->template->set("link_contacts", $this->url->contacts());
        $this->template->set("link_search", $this->url->search());
        $this->template->set("items", $this->section->getAllData());
        $this->template->set("content", $this->getContent());
        $this->template->display("main");
    }

    abstract protected function getContent();
}
?>

