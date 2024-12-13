<?php

namespace App;
class Router{
    public $currentRoute;

    public function __construct(){
        $this->currentRoute=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }


    public function getResource($route){
        $resourceIndex=mb_stripos($route, '{id}');
        if(!$resourceIndex){
            return false;
        }

        $resourceValue=substr($this->currentRoute, $resourceIndex);

        if($limit=mb_stripos($resourceValue,'/')){
            return substr($resourceValue,0,$limit);
        }

        return $resourceValue?: false;

    }

    public function get($route,$callback){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $resourceValue=$this->getResource($route);
            if($resourceValue){
                $resourceroute=str_replace('{id}', $resourceValue,$route);
                if($resourceroute== $this->currentRoute){
                    $callback($resourceValue);
                    exit();
                }
            }

            if($route==$this->currentRoute){
                $callback($resourceValue ?? null);
                exit();
            }
        }
    }

    public function post($route,$callback){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $resourceValue=$this->getResource($route);
            if($resourceValue){
                $resourceroute=str_replace('{id}', $resourceValue,$route);
                if($resourceroute== $this->currentRoute){
                    $callback($resourceValue);
                    exit();
                }
            }

            if($route==$this->currentRoute){
                $callback($resourceValue ?? null);
                exit();
            }
        }

    }

}