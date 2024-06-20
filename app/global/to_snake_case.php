<?php

if (!function_exists('to_snake_case')) {
  function to_snake_case(string $word): string
  {
    return ltrim(
      strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $word)),
      '_'
    );
  }
}