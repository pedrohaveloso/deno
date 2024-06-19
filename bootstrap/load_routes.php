<?php

foreach (glob(__BASEDIR__ . '/app/routes/*.php') as $route_file) {
  include $route_file;
}