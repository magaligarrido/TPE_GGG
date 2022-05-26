<?php

class AdminModel{
   private $db;

   //DEFINIR BD
   function __construct(){
       $this->db = new PDO('mysql:host=localhost;'.'dbname=turnofacil;charset=utf8', 'root', '');
   }

   //getUser
   //getUsers
   //newUser
}