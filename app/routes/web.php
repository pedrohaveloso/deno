<?php

get('/home', 'home@index');

get('/auth/choice', 'auth@choice');

get('/auth/login', 'auth@login');
post('/auth/login', 'auth@login_post');

get('/auth/register', 'auth@register');
post('/auth/register', 'auth@register_post');

