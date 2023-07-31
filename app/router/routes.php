<?php

$routes = [
  '/'                  => 'HomeService@index',

  '/users'             => 'UserService@list',
  '/users/create'      => 'UserService@index',
  '/users/login'       => 'UserService@login',
  '/users/update'      => 'UserService@update',
  
  '/books'             => 'BookService@index',
  '/books/create'      => 'BookService@create',
  '/books/list/{id}'   => 'BookService@listById',
  '/books/update/{id}' => 'BookService@update',
  '/books/remove/{id}' => 'BookService@remove',
];
