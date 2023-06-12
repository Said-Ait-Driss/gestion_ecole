<?php

namespace Validation;

class Validator
{
    private static $data;
    private static $errors = [];

    public static function validate( $data ,$rules)
    {
        self::$data = $data;
        foreach ($rules as $field => $rule) {
            $value = self::$data[$field];
            $validations = explode('|', $rule);

            foreach ($validations as $validation) {
                if ($validation === 'required') {
                    self::validateRequired($field, $value);
                } elseif (strpos($validation, 'min:') === 0) {
                    self::validateMin($field, $value, (int) substr($validation, 4));
                } elseif ($validation === 'email') {
                    self::validateEmail($field, $value);
                }
                elseif (strpos($validation, 'max:') === 0) {
                    self::validateMax($field, $value, (int) substr($validation, 4));
                }
            }
        }

        return  self::$errors;
    }

    private static function validateRequired($field, $value)
    {
        if (empty($value)) {
            self::$errors[$field] =  'Le champ ' . $field . ' est requis.';
        }
    }

    private static function validateMin($field, $value, $min)
    {
        if (strlen($value) < $min) {
            self::$errors[$field] = 'Le champ ' . $field . ' doit contenir au moins '. $min;
        }
    }

    private static function validateMax($field, $value, $max)
    {
        if (strlen($value) > $max) {
            self::$errors[$field] = 'Le champ ' . $field . ' doit contenir au maximum ' .$max;
        }
    }


    private static function validateEmail($field, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::$errors[$field] = 'Le champ ' . $field . ' doit être une adresse email valide.';
        }
    }
}



?>