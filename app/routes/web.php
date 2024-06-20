<?php

get('/home', 'home@index');

group(
  '/auth',
  function () {
    get('/choice', 'auth@choice');

    get('/login', 'auth@login');
    post('/login', 'auth@login_post');

    get('/register', 'auth@register');
    post('/register', 'auth@register_post');
  },
  [empty(Session::get('user'))],
  // fn() => redirect('/home')
);

