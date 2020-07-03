<?php
class User
{

    public static function fetch($input)
    {
        $pageNum = (int) $input['page'];
        $pageSize = (int) $input['limit'];
        $data = null;
        $total_count = self::getCountOfUsers();
        $offset = ($pageNum - 1) * $pageSize;

        $sql = "SELECT * FROM user ORDER BY user_id ASC LIMIT :limit OFFSET :offset";
        $req = Model::getDbInstance()->prepare($sql);
        $req->bindParam(':limit', $pageSize, PDO::PARAM_INT);
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);
        $req->execute();

        $data['users'] = array();
        while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
            array_push($data['users'], array(
                'user_id' => $result['user_id'],
                'user_name' => $result['user_name'],
                'user_longname' => $result['user_longname'],
                'user_created_on' => $result['user_created_on'],
                'user_updated_on' => $result['user_updated_on']
            ));
        }

        $data['total_pages'] = ceil($total_count / $pageSize);
        $data['page'] = $pageNum;
        $data['limit'] = $pageSize;
        $data['offset'] = $offset;
        $data['redirect'] = $input['pagination_url'];

        if ($data['total_pages'] <= 10) {
            $data['start'] = 1;
            $data['end'] = $data['total_pages'];
        } else {
            $data['start'] = max(1, ($data['page'] - 4));
            $data['end'] = min($data['total_pages'], ($data['page'] + 5));

            if ($data['start'] === 1) {
                $data['end'] = 10;
            } elseif ($data['end'] === $data['total_pages']) {
                $data['start'] = ($data['total_pages'] - 9);
            }
        }

        return  $data;
    }

    public static function fetchOne($id)
    {
        $data = null;
        // $id = (int) $id;
        $sql = "SELECT * FROM user WHERE user_id = :userid LIMIT 1";
        $req = Model::getDbInstance()->prepare($sql);
        $req->bindParam(':userid', $id, PDO::PARAM_INT);
        $req->execute();

        if ($req->execute()) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                $data['user_id'] = $result['user_id'];
                $data['user_name'] = $result['user_name'];
                $data['user_longname'] = $result['user_longname'];
            }
            return $data;
        } else {
            return $data;
        }
    }

    public static function update($fullname, $username, $password, $user_id)
    {
        $datetime_now = date('Y-m-d H:i:s');
        $sql = "UPDATE user
                    SET user_name = CASE WHEN :user_name = '' THEN user_name ELSE :user_name END, 
                        user_password = CASE WHEN :user_password = '' THEN user_password ELSE :user_password END, 
                        user_longname = CASE WHEN :user_longname = '' THEN user_longname ELSE :user_longname END,
                        user_updated_on = :user_updated_on
                WHERE user_id = :user_id
                AND NOT EXISTS ( 
                        SELECT * FROM user WHERE user_name = :user_name AND user_id <> :user_id
                    )";
        $req = Model::getDbInstance()->prepare($sql);
        $req->bindParam(':user_longname', $fullname, PDO::PARAM_STR);
        $req->bindParam(':user_name', $username, PDO::PARAM_STR);
        $req->bindParam(':user_password', $password, PDO::PARAM_STR);
        $req->bindParam(':user_updated_on', $datetime_now, PDO::PARAM_STR);
        $req->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        if ($req->execute()) {
            if ($req->rowCount()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM user WHERE user_id = :user_id";
        $req = Model::getDbInstance()->prepare($sql);
        $req->bindParam(':user_id', $id, PDO::PARAM_INT);
        $req->execute();
        if ($req->execute()) {
            if ($req->rowCount()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public static function create($long_name, $username, $password)
    {
        $datetime_now = date('Y-m-d H:i:s');

        if (self::checkUsernameAvailability($username)) {
            $sql = "INSERT INTO user (user_longname, user_name, user_password, user_created_on) 
                VALUES (:user_longname, :user_name, :user_password, :user_created_on)";
            $req = Model::getDbInstance()->prepare($sql);
            $req->bindParam(':user_longname', $long_name, PDO::PARAM_STR);
            $req->bindParam(':user_name', $username, PDO::PARAM_STR);
            $req->bindParam(':user_password', $password, PDO::PARAM_STR);
            $req->bindParam(':user_created_on', $datetime_now, PDO::PARAM_STR);
            if ($req->execute()) {
                if ($req->rowCount()) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }

    private static function checkUsernameAvailability($username)
    {
        $count = 0;
        $sql = "SELECT COUNT(*) FROM user WHERE user_name = :user_name LIMIT 1";
        $req = Model::getDbInstance()->prepare($sql);
        $req->bindParam(':user_name', $username, PDO::PARAM_STR);
        if ($req->execute()) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                $count = $result['COUNT(*)'];
            }
            return $count <= 0 ? TRUE : FALSE;
        }
        return FALSE;
    }

    private static function getCountOfUsers()
    {
        $total_count = 0;
        $sql = "SELECT COUNT(*) FROM user";
        $req = Model::getDbInstance()->prepare($sql);
        if ($req->execute()) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                $total_count = $result['COUNT(*)'];
            }
            return $total_count;
        }
        return $total_count;
    }
}
