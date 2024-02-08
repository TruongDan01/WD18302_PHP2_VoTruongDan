<?php

namespace Illuminate\framework\base;

use Illuminate\framework\base\Model;

class Validator
{
    /**
     * Check if the value is a number.
     *
     * @param mixed $value
     * @return bool
     */
    public static function numeric($value)
    {
        return is_numeric($value);
    }

    /**
     * Check if the value is a not number.
     *
     * @param mixed $value
     * @return bool
     */
    public static function notNumeric($value)
    {
        return !is_numeric($value);
    }

    /**
     * Check if the value is a natural number.
     *
     * @param mixed $value
     * @return bool
     */
    public static function naturalNumeric($value)
    {
        return is_numeric($value) && $value <= 0;
    }

    /**
     * Check if the value is empty.
     *
     * @param mixed $value
     * @return bool
     */
    public static function required($value)
    {
        return empty($value);
    }

    /**
     * Check if the value === value2.
     *
     * @param mixed $value1
     * @param mixed $value2
     * @return bool
     */
    public static function equals($value1, $value2)
    {
        return $value1 === $value2;
    }

    /**
     * Check if the value is a positive number.
     *
     * @param mixed $value
     * @return bool
     */
    public static function positiveNumeric($value)
    {
        return is_numeric($value) && $value > 0;
    }

    /**
     * Check if the value is a negative number.
     *
     * @param mixed $value
     * @return bool
     */
    public static function negativeNumeric($value)
    {
        return is_numeric($value) && $value < 0;
    }

    /**
     * Check if the value is a valid email address.
     *
     * @param mixed $value
     * @return bool
     */
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Check if the value meets the password format requirements.
     *
     * @param mixed $value
     * @return bool
     */
    public static function password($value)
    {
        // Modify the regular expression as per your password format requirements
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/';
        return preg_match($pattern, $value) === 1;
    }

    /**
     * Check if the value is a valid URL.
     *
     * @param mixed $value
     * @return bool
     */
    public static function url($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Check if the value is a valid IP address.
     *
     * @param mixed $value
     * @return bool
     */
    public static function ipAddress($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }

    /**
     * Check if the value is a valid date.
     *
     * @param mixed $value
     * @return bool
     */
    public static function date($value)
    {
        return strtotime($value) !== false;
    }

    /**
     * Check if the value is a valid phone number.
     *
     * @param mixed $value
     * @return bool
     */
    public static function phoneNumber($value)
    {
        // Modify the regular expression as per your phone number validation rules
        $pattern = '/^\+\d{1,3}\s?\(\d{3}\)\s?\d{3}-\d{4}$/';
        return preg_match($pattern, $value) === 1;
    }

    /**
     * Check if the value is a valid credit card number.
     *
     * @param mixed $value
     * @return bool
     */
    public static function creditCard($value)
    {
        // Modify the regular expression as per your credit card validation rules
        $pattern = '/^\d{4}-\d{4}-\d{4}-\d{4}$/';
        return preg_match($pattern, $value) === 1;
    }

    /**
     * Check if the value is a valid postal code.
     *
     * @param mixed $value
     * @return bool
     */
    public static function postalCode($value)
    {
        // Modify the regular expression as per your postal code validation rules
        $pattern = '/^\d{5}$/';
        return preg_match($pattern, $value) === 1;
    }

    /**
     * Check if the value is a valid username.
     *
     * @param mixed $value
     * @return bool
     */
    public static function username($value)
    {
        // Modify the regular expression as per your username validation rules
        $pattern = '/^[a-zA-Z0-9_]{4,}$/';
        return preg_match($pattern, $value) === 1;
    }

    /**
     * Check if the value contains only alphabetic characters.
     *
     * @param mixed $value
     * @return bool
     */
    public static function alphabetic($value)
    {
        return ctype_alpha($value);
    }

    /**
     * Check if the value has a specified minimum length.
     *
     * @param mixed $value
     * @param int $minLength
     * @return bool
     */
    public static function minLength($value, $minLength)
    {
        $length = mb_strlen($value);
        return $length >= $minLength;
    }

    /**
     * Check if the value has a specified maximum length.
     *
     * @param mixed $value
     * @param int $maxLength
     * @return bool
     */
    public static function maxLength($value, $maxLength)
    {
        $length = mb_strlen($value);
        return $length <= $maxLength;
    }

    /**
     * Check if the value has a length within a specified range.
     *
     * @param mixed $value
     * @param int $minLength
     * @param int $maxLength
     * @return bool
     */
    public static function lengthBetween($value, $minLength, $maxLength)
    {
        $length = mb_strlen($value);
        return $length >= $minLength && $length <= $maxLength;
    }

    public static function unique($value)
    {
        if ($value == 'unique') {
            $tableName = null;
            $fieldCheck = null;

            if (!empty($value[1])) {
                $tableName = $value[1];
            }

            if (!empty($value[2])) {
                $fieldCheck = $value[2];
            }

            if (!empty($tableName) && !empty($fieldCheck)) {
                $model = new Model();
                $query = $model->query("SELECT COUNT(*) FROM $tableName WHERE $fieldCheck = :value");
                if (!empty($query)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
