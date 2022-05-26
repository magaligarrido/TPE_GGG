<?php

class UserModel{
   private $db;

   //DEFINIR BD
   function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_ggg;charset=utf8', 'root', '');

   }

   //getUser
   //getUsers
   //newUser
}