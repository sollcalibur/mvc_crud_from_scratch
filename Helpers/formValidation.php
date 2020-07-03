<?php
class FormValidation
{

    public static function validate($input, $validation, $minLength, $maxLength)
    {
        $str_length = strlen($input);
        if ($str_length <= $maxLength && $str_length >= $minLength) {
            switch ($validation) {
                case Constants::ALPHA:
                    return self::hardValidateAlpha($input);
                    break;
                case Constants::ALPHA_NUMERIC:
                    return self::hardValidateAlphaNumeric($input);
                    break;
                case Constants::EMAIL:
                    return self::hardValidateEmail($input);
                    break;
                case Constants::PASSWORD:
                    return self::hardValidatePassword($input);
                    break;
                default:
                    return TRUE;
            }
        }
    }

    private static function hardValidateAlpha($input)
    {
        if (!preg_match(Constants::REGEX_APLHA_NAME, $input)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private static function hardValidateAlphaNumeric($input)
    {
        if (!preg_match(Constants::REGEX_ALPHA_NUMERIC, $input)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private static function hardValidateEmail($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private static function hardValidatePassword($input)
    {
        return TRUE;
    }
}
