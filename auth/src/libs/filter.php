<?php

/**
 * Sanitize and validate data
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function myFunc($a) {
    return htmlspecialchars($a, ENT_QUOTES);
  }
function filter(array $data, array $fields, array $messages = []): array
{
    $validation = [];


    $inputs = array_map("myFunc", $data);
    $errors = validate($inputs, $validation, $messages);

    return [$inputs, $errors];
}