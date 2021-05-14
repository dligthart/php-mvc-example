<?php
/**
 * Class View.
 * 
 * @author dligthart <ligthart@pm.me>
 * @package phpcursus
 */
class View {

    private $name;
    private $output;

    public function __construct($name) {
        $this->name = $name;
    }
    
    public function render() {

        $includePath = dirname(__FILE__) . '/../resources/views/' . $this->name . '.php';
       
        ob_start();
        require $includePath; // check if file exists.
        $this->output = ob_get_contents();
        ob_end_clean();
    }

    public function fetch() {
        $this->render();
        return $this->output;
    }

}