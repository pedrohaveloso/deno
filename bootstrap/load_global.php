<?php

foreach (glob(__BASEDIR__ . '/app/global/*.php') as $global_file) {
  include $global_file;
}