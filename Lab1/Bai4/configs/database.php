<?php 
class Config {
   public static function getDbConfig() {
       return array(
           'host' => 'localhost',
           'username' => 'root',
           'password' => '',
           'dbname' => 'feedback'
       );
   }
}