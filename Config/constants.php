<?php
class Constants
{
    // FORM VALIDATION
    const VALIDATE_HARD = 'VALIDATE_HARD';
    const VALIDATE_SOFT = 'VALIDATE_SOFT';
    const ALPHA = 'ALPHA';
    const ALPHA_NUMERIC = 'ALPHA_NUMERIC';
    const EMAIL = 'EMAIL';
    const PASSWORD = 'PASSWORD';
    const REGEX_ALPHA_NUMERIC = "/^[a-zA-Z0-9]*$/";
    const REGEX_APLHA_NAME = "/^[a-zA-Z ]*$/";
    const MIN_CHAR_LIMIT = 5;
    const MAX_CHAR_LIMIT = 49;
    const MIN_CHAR_LIMIT_PASS = 10;
    const MAX_CHAR_LIMIT_PASS = 49;

    // FLAGS
    const DELETE_SUCESS = "delete_sucess";
    const UPDATE_SUCCESS = "update_success";
    const CREATE_SUCCESS = "create_success";
}
