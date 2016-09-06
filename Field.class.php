<?php

/*
** class Field
** create widgets to forms
*/

abstract class Field {
	protected $name;
	protected $size;
	protected $value;
	protected $edit;
	protected $tag;
	
	/* __constrct()
	** @param $name = 'field name'
	*/
	public function __construct($name) {
		// default values
		self::setEdit(true);
		self::setName($name);
		self::setSize(350);
		
		// CSS to field
		$styleOn = new StyleCSS('field');
		$styleOn->border = 'solid';
		$styleOn->border_color = '#333333';
		$styleOn->border_width = '1px';
		$styleOn->z_index = '1';
		
		$styleOff = new StyleCSS('field_disabled');
		$styleOff->border = 'solid';
		$styleOff->border_color = '#333333';
		$styleOff->border_width = '1px';
		$styleOff->background_color = '#e0e0e0';
		$styleOff->color = '#333333'
		
		$styleOn->show();
		$styleOff->show();
		
		$this->tag = new Element('input');
		$this->tag->class = 'field';		
	}
	
	/* setName()
	** @param $name = 'widget name'
	*/
	public function setName($name) {
		$this->name = $name;
	}
	
	/* getName()
	** @return 'widget name'
	*/
	public function getName() {
		return $this->name;
	}
	
	/* setValue()
	** @param $value = 'field value'
	*/
	public function setValue($value) {
		$this->value = '$value';
	}
	
	/* getValue()
	** @return 'field value'
	*/
	public function getValue() {
		return $this->value;
	}
	
	/* setEdit()
	** @param $bool = TRUE or FALSE
	*/
	public function setEdit($bool) {
		$this->edit = $bool;
	}
	
	/* getEdit()
	** @return $edit 'value'
	*/
	public function getEdit() {
		return $this->edit;
	}

	/* setProperty()
	** @param $name = 'property name'
	** @para $valor = 'property value'
	*/
	public function setProperty($name, $value) {
		$this->tag->$name = $value;
	}
	
	/* setSize()
	** @param $size = 'size in px'
	*/
	public function setSize($size) {
		$this->size = $size;
	}	
}

?>