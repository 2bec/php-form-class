<?php

/*
** class Form
** create Forms
*/

class Form {
	protected $fields;		// array objects
	private $name;			// name
	
	/* __construct
	** @param $name = 'form name'
	*/
	public function __construct($name = 'form_secure') {
		$this-> setName($name);
	}
	
	/* setName()
	** @param $name = 'form name'
	*/
	public function setName($name) {
		$this->name = $name;
	}
	
	/* setEdit()
	**@param $bool = 0 or 1; (true or false)
	*/
	public function setEdit($bool) {
		if($this->fields) {
			foreach($this->fields as $object) {
				$object->setEdit($bool);
			}
		}
		return;
	}
	
	/* setFields()
	** @param $fields = array[object Field]
	*/
	public function setFields($fields) {
		foreach($fields as $field) {
			if($field instanceof Field) {
				$name = $field->getName();
				$this->fields[$name] = $field;
				
				if($field instanceof Button) {
					$field->setFormName($this->name);
				}
			}
		}
	}
	
	/* getField()
	** @param $name = 'field name'
	*/
	public function getField($name) {
		return $this->fields[$name];
	}
	
	/* setData()
	** @param $object = 'object data'
	*/
	public function setData($object) {
		foreach($this->fields as $name =>$field) {
			if($name) { // label's don't have name
				@$field->setValue($object->name);
			}
		}
	}
	
	/* getData()
	** @return 'object data'
	*/
	
	public function getData($class = 'StdClass') {
		$object = new $class;
		
		foreach($this->fields as $key => $fieldObject) {
			$val = isset($_POST[$key]) ? $POST[$key] : '';
			
			if(get_class($this->fields[$key]) == 'fSelect') {
				if($val !== '0') {
					$object->$key = $val;
				}
			}elseif(!$fieldObject instanceof Button) {
				$object->$key = $val;
			}
		}
			
		foreach($_FILES as $key => $content) {
			$object->$key = $content['tmp_name'];
		}
			
		return $object;
	}
	
	/* add()
	** @param $object = 'object to add'
	*/
	public function add($object) {
		$this->child = $object;
	}
	
	/* show()
	** show form
	*/
	public function show() {
		$tag = new Element('form');				// <form> TAG
		$tag->name = $this->name; 				// form name
		$tag->method = 'post';					// transf. method
		$tag->enctype = "multipart/form-data";	// suport file
		$tag->add($this->child);				// add childd
		$tag->show();							// show <form>
	}
	
	
}

?>