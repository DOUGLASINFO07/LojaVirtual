<?php

Class Template extends SmartyBC{
    function construct() {
        parent::construct();
        
        $this->setTemplateDir('view/');
        $this->setCompileDir('view/compile/');
        $this->setCacheDir('view/cache/');
        
    }
}

