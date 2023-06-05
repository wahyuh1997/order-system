<?php

function trace($value)
{
  echo "<pre>";
  var_dump($value);
  exit();
};

/**
 * Decription
 * Check for the value if null or not
 *
 * @param string / int
 * @return string / int
 */

function check_null($value, $seperate = '-')
{
  if ($value == null) {
    $res = ($value == null  ? $seperate : $value);
  } else {
    $res = ($value == ''  ? '' : $value);
  }

  return $res;
}

function check_null_number($value)
{
  if ($value == null) {
    $res = ($value == null  ? 0 : $value);
  } else {
    $res = ($value == ''  ? 0 : $value);
  }

  return $res;
}

/**
 * Default currency format
 *
 * @return float
 */

function currency_format($value)
{
  return number_format($value, 2, ".", ",");
}


/**
 * Print checklist or not
 */

function check_bool_icon($value)
{
  if ($value == 0) {
    $icon = '<i class="fa fa-times text-danger"></i>';
  } else if ($value == 1) {
    $icon = '<i class="fa fa-check text-success"></i>';
  } else {
    $icon = '???';
  }

  return $icon;
}
