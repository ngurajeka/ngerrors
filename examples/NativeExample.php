<?php

use Ng\Errors;

$ngerrors   = new Errors\NgErrors();

$input_x    = array(
    "name"  => "ady",
    "age"   => 24,
);

$input_y    = array(
    "name"  => true,
    "age"   => "some age",
);

$input_z    = array();

function checkName($input)
{

    // check name is exist and a valid string
    if (!isset($input["name"])) {
        $ngerrors->append(Errors\SimpleError(404, "Field Name was Not found"));
        return;
    }

    if (!is_string($input["name"])) {
        $ngerrors->append(
            Errors\SimpleError(409, "Field Name has Invalid value")
        );
    }
}

function checkAge($input)
{
    // check age is exist and a valid integer
    if (!isset($input["age"])) {
        $ngerrors->append(Errors\SimpleError(404, "Field Age was Not Found"));
        return;
    }

    if (!is_integer($input["age"])) {
        $ngerrors->append(
            Errors\SimpleError(409, "Field Age has Invalid value")
        );
    }
}

function check($input)
{
    checkName($input);
    checkAge($input);
}

// checking input_x
check($input_x);
if (!$ngerrors->isEmpty()) {
    var_dump($ngerrors->toArray());
    $ngerrors->flush();
}

// checking input_y
check($input_y);
if (!$ngerrors->isEmpty()) {
    var_dump($ngerrors->toArray());
    $ngerrors->flush();
}

// checking input_z
check($input_z);
if (!$ngerrors->isEmpty()) {
    var_dump($ngerrors->toArray());
    $ngerrors->flush();
}
