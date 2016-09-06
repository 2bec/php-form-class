<?php

/*
** class Label
** create <label>
*/

class Label extends Field {
	private $fontSize; // font-size
	private $fontFamily; // font-family
	private $fontColor; // color
	
	/* __contruct()
	** @param $value = 'label text'
	*/
	public function __contruct($value) {
		// content <label> 
		$this->setValue($value);
		
		// new Element <label>
		$this->tag = new Element('label');
		
		// default's values
		$this->fontSize = '14';
		$this->fontFace = 'Trebusht MS, Verdana, Arial';
		$this->fontColor = '#333333';
	}
	
	/* setSize()
	** @param $size = 'font size in px'
	*/
	public function setSize($size) {
		$this->fontSize = $size;
	}
	
	/* setFamily()
	** @param $family = 'font face'
	*/
	public function setFamily($family) {
		$this->fontFamily = $family;
	}
	
	/* setColor()
	** @param $color = 'font color'
	*/
	public function setColor($color) {
		$this->fontColor = $color;
	}
	
	/* show()
	** show widget
	*/
	public function show() {
		// CSS to tag
		$this->tag->style = "font-family:{$this->fontFamily};" . "font-size:{$this->fontSize};" . "color:{$this->fontColor};";
		
		// add content to tag
		$this->tag->add($this->value);
		
		// show tag
		$this->tag->show();
	}
}

?>