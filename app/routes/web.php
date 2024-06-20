<?php

get('/home', 'home@index');

get('/auth/choice', 'auth@choice');
get('/auth/login', 'auth@login');
get('/auth/register', 'auth@register');