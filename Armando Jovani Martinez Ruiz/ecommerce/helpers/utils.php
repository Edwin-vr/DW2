<?php

class Utils{
   public static function isAdmin(){
      if(!isset($_SESSION['admin'])){
         header('Location:'.base_url);
         ob_end_flush();
      }else{
           return true;
      }
   }

   public static function getCategoria($id){

   }
}