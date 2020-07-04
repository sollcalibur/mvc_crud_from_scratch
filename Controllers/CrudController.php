<?php
class CrudController extends Controller
{
    function __construct()
    {
    }

    function index($page = 1, $status = "")
    {
        $input['page'] = (int) $page === 0 ? 1 : $page;
        $input['limit'] = 5;
        $input['pagination_url'] = WEBROOT . "crud/index/";

        $data['data'] = User::fetch($input);
        $data['data']['delete_sucess'] = FALSE;
        if ($status == Constants::DELETE_SUCESS) {
            $data['data']['delete_sucess'] = TRUE;
        }
        if ($status == Constants::UPDATE_SUCCESS) {
            $data['data']['update_success'] = TRUE;
        }
        if ($status == Constants::CREATE_SUCCESS) {
            $data['data']['create_success'] = TRUE;
        }
        $this->set($data);
        $this->render("Index");
    }

    function create()
    {
        $data['data']['MIN_CHAR_LIMIT'] = Constants::MIN_CHAR_LIMIT;
        $data['data']['MAX_CHAR_LIMIT'] = Constants::MAX_CHAR_LIMIT;
        $data['data']['MIN_CHAR_LIMIT_PASS'] = Constants::MIN_CHAR_LIMIT_PASS;
        $data['data']['MAX_CHAR_LIMIT_PASS'] = Constants::MAX_CHAR_LIMIT_PASS;
        $data['data']['result'] = "";

        if (isset($_POST['submit'])) {
            $validation = FormValidation::validate($_POST['name'], Constants::ALPHA, Constants::MIN_CHAR_LIMIT, Constants::MAX_CHAR_LIMIT)
                && FormValidation::validate($_POST['username'], Constants::ALPHA_NUMERIC, Constants::MIN_CHAR_LIMIT, Constants::MAX_CHAR_LIMIT)
                && FormValidation::validate($_POST['password'], Constants::PASSWORD, Constants::MIN_CHAR_LIMIT_PASS, Constants::MAX_CHAR_LIMIT_PASS);
            if ($validation) {
                $encrypted_password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));
                $data['data']['result'] = User::create($_POST['name'], $_POST['username'], $encrypted_password);
                if ($data['data']['result']) {
                    header("Location: " . WEBROOT . "crud/index/1/" . Constants::CREATE_SUCCESS);
                }
            } else {
                $data['data']['result'] = FALSE;
            }
        } else {
        }
        $this->set($data);
        $this->render("Create");
    }

    function update($id)
    {
        $data['data'] = NULL;
        $data['data'] = User::fetchOne($id);
        $data['data']['result'] = "";
        $data['data']['MIN_CHAR_LIMIT'] = Constants::MIN_CHAR_LIMIT;
        $data['data']['MAX_CHAR_LIMIT'] = Constants::MAX_CHAR_LIMIT;
        $data['data']['MIN_CHAR_LIMIT_PASS'] = Constants::MIN_CHAR_LIMIT_PASS;
        $data['data']['MAX_CHAR_LIMIT_PASS'] = Constants::MAX_CHAR_LIMIT_PASS;

        if (empty($data['data']['user_id'])) {
            header("Location: " . WEBROOT . "crud/index/1");
        }

        if (isset($_POST['submit'])) {
            $validation = FormValidation::validate($_POST['name'], Constants::ALPHA, Constants::MIN_CHAR_LIMIT, Constants::MAX_CHAR_LIMIT)
                && FormValidation::validate($_POST['username'], Constants::ALPHA_NUMERIC, Constants::MIN_CHAR_LIMIT, Constants::MAX_CHAR_LIMIT)
                && FormValidation::validate($_POST['password'], Constants::PASSWORD, Constants::MIN_CHAR_LIMIT_PASS, Constants::MAX_CHAR_LIMIT_PASS);
            if ($validation) {
                $data['data']['user_name'] = $_POST['username'];
                $data['data']['user_longname'] = $_POST['name'];
                $encrypted_password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));
                $data['data']['result'] = User::update($_POST['name'], $_POST['username'], $encrypted_password, $id);
                if ($data['data']['result']) {
                    header("Location: " . WEBROOT . "crud/index/1/" . Constants::UPDATE_SUCCESS);
                }
            } else {
                $data['data']['user_name'] = $_POST['username'];
                $data['data']['user_longname'] = $_POST['name'];
                $data['data']['result'] = FALSE;
            }
        }

        $this->set($data);
        $this->render("Update");
    }

    function delete($id)
    {
        User::delete($id);
        header("Location: " . WEBROOT . "crud/index/1/" . Constants::DELETE_SUCESS);
    }
}
