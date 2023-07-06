<?php

/**
 * TSForm script created by ThemeArt
 * http://themeart.net
 * 
 * @author      ThemeArt
 * @version     1.0.0
 * @license     GNU General Public License, version 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 */

class ts_form{
    protected $_default_args = array(
                                  'echo' => true ,
                                  'id' => '' ,
                                  'class' => '' ,
                                  'name' => '' ,
                                  'style' => '' ,
                                  'value' => '' ,
                                  'disabled' => false ,
                                  'atts' => array()
                                );

    public function __construct(){
        
    }
	
	private function set_default_args($defaults , &$values){
        if($values == null){
            $values = array();
        }

        foreach($defaults as $k => $v){
            if(!isset($values[$k])){
                $values[$k] = $v;
            }
        }
    }

    /**
     * Create an HTML element.
     * 
     * @param string $name
     * @param array $args
     * @param boolean $close
     * @param boolean $self_closed
     * @param string $content
     * 
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function create_element($name , 
                                   $args ,
                                   $close = true ,
                                   $self_closed = true ,
                                   $content = null){
        $this->set_default_args($this->_default_args , $args);
        $s = '<' . $name;

        if(is_array($args['class']))  $args['class'] = implode(' ' , $args['class']);

        $attributes = array();
        if($args['id']) $attributes[] = 'id = "' . $args['id'] . '"';
        if($args['class']) $attributes[] = 'class = "' . $args['class'] . '"';
        if($args['name']) $attributes[] = 'name = "' . $args['name'] . '"';
        if($args['value']) $attributes[] = 'value = "' . $args['value'] . '"';
        if($args['style']) $attributes[] = 'style = "' . $args['style'] . '"';
        if($args['disabled']) $attributes[] = 'disabled = "disabled"';

        foreach($args['atts'] as $k => $v){
            if($v !== '' && $v !== false) $attributes[] = $k . ' = "' . $v . '"';
        }

        if(!empty($attributes)){
            $s .= ' ';
        }

        $s .= implode(' ' , $attributes);

        if($close){
            if($self_closed){
                $s .= ' />';
            }else{
                $s .= '>' . ($content ? $content : '') . '</' . $name . '>';
            }
        }else{
            $s .= '>';
        }
        
        if($args['echo']){
            echo $s;
        }

        return $s;
    }

    /**
     * Start a form.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'action' => '' ,
     *         'method' => 'post' ,
     *         'enctype' => '' ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function start_form($args = null){
        $default_args = $this->_default_args;
        $default_args['action'] = '';
        $default_args['method'] = 'post';
        $default_args['enctype'] = '';
        $this->set_default_args($default_args , $args);

        $args['value'] = '';
        $args['disabled'] = false;

        // replace 'action', 'method' and 'enctype'
        $args['atts']['action'] = $args['action'];
        unset($args['action']);
        $args['atts']['method'] = $args['method'];
        unset($args['method']);
        $args['atts']['enctype'] = $args['enctype'];
        unset($args['enctype']);

        return $this->create_element('form' , $args , false , false);
    }

    /**
     * End an opened form.
     * 
     * @param array $args
     * @return string
     */
    public function end_form(){
        return $this->create_element('/form' , array() , false , false);
    }

    /**
     * Start a fieldset.
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function start_fieldset(array $args = null){
        $default_args = $this->_default_args;
        $this->set_default_args($default_args , $args);

        $args['value'] = '';
        $args['disabled'] = false;

        return $this->create_element('fieldset' , $args , false , false);
    }

    /**
     * End an opened fieldset.
     * 
     * @param array $args
     * @return string
     */
    public function end_fieldset(){
        return $this->create_element('/fieldset' , array() , false , false);
    }

    /**
     * Create a text field.
     *
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function text($args = null){
        $default_args = $this->_default_args;
        $this->set_default_args($default_args , $args);

        // override 'type', if passed
        $args['atts']['type'] = 'text';

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a password field.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function password($args = null){
        $default_args = $this->_default_args;
        $this->set_default_args($default_args , $args);

        // override 'type', if passed
        $args['atts']['type'] = 'password';

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a text area.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function textarea($args = null){
        $default_args = $this->_default_args;
        $this->set_default_args($default_args , $args);

        // replace 'value'
        $content = $args['value'];
        $args['value'] = '';

        return $this->create_element('textarea' , $args , true , false , $content);
    }

    /**
     * Create a checkbox.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'checked' => false ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function checkbox($args = null){
        $default_args = $this->_default_args;
        $default_args['checked'] = '';
        $this->set_default_args($default_args , $args);

        // override 'type', if passed
        $args['atts']['type'] = 'checkbox';
        
        // replace 'checked'
        $args['atts']['checked'] = $args['checked'] ? 'checked' : '';
        unset($args['checked']);

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a radio button.
     *
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'checked' => false ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function radio($args = null){
        $default_args = $this->_default_args;
        $default_args['checked'] = '';
        $this->set_default_args($default_args , $args);

        // override 'type', if passed
        $args['atts']['type'] = 'radio';

        // replace 'checked'
        $args['atts']['checked'] = $args['checked'] ? 'checked' : '';
        unset($args['checked']);

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a drop-down list.
     *
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'selected_index' => null ,
     *         'disabled' => false ,
     *         'options' => array() ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function select($args = null){
        $default_args = $this->_default_args;
        $default_args['options'] = array();
        $this->set_default_args($default_args , $args);

        // replace 'options'
        $options = $args['options'];
        unset($args['options']);

        $r = $this->create_element('select' , $args , false , false);

        // add options
        $i = 0;
        foreach($options as $k => $v){
            $option_args = $this->_default_args;
            $option_args['echo'] = $args['echo'];
            $option_args['value'] = $k;
            if((isset($args['selected_index']) && $args['selected_index'] == $i) ||
               (isset($args['value']) && $args['value'] == $k)){
                $option_args['atts']['selected'] = 'selected';
            }
            $r .= $this->create_element('option' , $option_args , true , false , $v);
            $i++;
        }

        $r .= $this->create_element('/select' , array('echo' => $args['echo']) , false , false);
        return $r;
    }

    /**
     * Create a range selector.
     *
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'min' => 0 ,
     *         'max' => 100 ,
     *         'value' => 50 ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function range($args = null){
        $default_args = $this->_default_args;
        $default_args['min'] = 0;
        $default_args['max'] = 100;
        $default_args['value'] = 50;
        $this->set_default_args($default_args , $args);

        // replace 'min' and 'max'
        $args['atts']['min'] = $args['min'];
        $args['atts']['max'] = $args['max'];
        unset($args['min']);
        unset($args['max']);

        // override 'type', if passed
        $args['atts']['type'] = 'range';

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a color picker.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function color($args = null){
        $default_args = $this->_default_args;
        $this->set_default_args($default_args , $args);

        // add 'color' class
        $classes = $args['class'] ? explode(' ', $args['class']) : array();
        $classes[] = 'color';
        $args['class'] = implode(' ' , $classes);

        // override 'type', if passed
        $args['atts']['type'] = 'text';

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a file input field.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'accept' => array() ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function file_upload($args = null){
        // audio/*|video/*|image/*|MIME_type
        $default_args = $this->_default_args;
        $default_args['accept'] = array();
        $this->set_default_args($default_args , $args);

        // add 'accept' formats
        $args['atts']['accept'] = implode(',' , $args['accept']);
        unset($args['accept']);

        // override 'type', if passed
        $args['atts']['type'] = 'file';

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a submit button for the form.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function submit($args = null){
        $default_args = $this->_default_args;
        $this->set_default_args($default_args , $args);

        // override 'type', if passed
        $args['atts']['type'] = 'submit';

        return $this->create_element('input' , $args , true , true);
    }

    /**
     * Create a reset button for the form.
     * 
     * @param array $args
     * @return string
     *
     * Arguments array:
     * <pre>
     * array(
     *         'echo' => true ,
     *         'id' => '' ,
     *         'class' => '' ,
     *         'name' => '' ,
     *         'style' => '' ,
     *         'value' => '' ,
     *         'disabled' => false ,
     *         'atts' => array()
     *       );
     * </pre>
     */
    public function reset($args = null){
        $default_args = $this->_default_args;
        $this->set_default_args($default_args , $args);

        // override 'type', if passed
        $args['atts']['type'] = 'reset';

        return $this->create_element('input' , $args , true , true);
    }

}