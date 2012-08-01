<?php
class Application_Model_NotORM
{

	public $fields;
	public $NotORM = false;
	private $options;
	
	public function __construct($options = array()) {
    $config = Zend_Controller_Front::getInstance()->getParam('bootstrap')->getOption('notorm');
    $this->setOptions($config);
    if (isset($options) and is_array($options) and count($options)) {
      $this->appendOptions($options);
    }
  	$this->init();
	}
	
	private function setOptions($array) {
  	$this->options = $array;
	}
	
	private function appendOptions($array) {
  	$this->options = array_merge($this->options, $array);
	}
	
  // intialize the class & database
	public function init() {
    if (!$this->NotORM) {
      require_once("NotORM/NotORM.php");
      $o = $this->options;
    	$pdo = new PDO('mysql:host='.$o['host'].';dbname='.$o['database'], $o['user'], $o['password']);
      $db = new NotORM($pdo);
      $this->NotORM = $db;
    }
	}
	
	public function arrayize($result) {
  	foreach ($result as $row) {
  	  $item = null;
    	foreach ($this->fields as $field) {
      	$item[$field] = $row[$field];
    	}
    	$items[] = $item;
  	}
  	return $items;
	}
}