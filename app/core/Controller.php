<?php
     class Controller{
          public function model($model){
               // require_once './app/model/'.$model.'.php';
               include './app/model/'.$model.'.php';
               return new $model;
          }

          public function view($view,$data=[]){
               // require_once './app/view/'.$view.'.php';
               include './app/view/'.$view.'.php';
               //return new $view;
          }
     }
?>