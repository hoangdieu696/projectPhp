<?php
    class App {
        protected $controller ="Home" ;
        protected $action ="index"; 
        protected $params=[] ;

            function __construct()
            {
                $arr = $this->UrlProcess() ;
                if(isset($arr) && count($arr) <= 1 ){
                    header("location: ./.");
                }
                if($arr!=null && count($arr) >= 2) 
                {
                    if(file_exists("./MVC_PHP/Controller/".$arr[0].".php")){
                        $this->controller = $arr[0] ;
                        unset($arr[0]) ;
                    }
                }
               require_once("./MVC_PHP/Controller/".$this->controller.".php");
                $this->controller = new $this->controller;
                // action
                if(isset($arr[1])) {
                    
                    if(method_exists($this->controller,$arr[1])){
                        $this->action = $arr[1];
                    }
                    unset($arr[1]) ;
                }
                $this->params = $arr?array_values($arr):[];
                call_user_func_array([$this->controller,$this->action],$this->params);
            }

            function UrlProcess() 
            {
                if(isset($_GET['url'])) {
                    return explode("/",filter_var(trim($_GET['url'],"/")));
                }
            }
    }
