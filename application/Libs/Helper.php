<?php

namespace Mini\Libs;

use Mini\Model\User;
use stdClass;

class Helper
{

    /**
     * debugPDO
     *
     * Shows the emulated SQL query in a PDO statement. What it does is just extremely simple, but powerful:
     * It combines the raw query and the placeholders. For sure not really perfect (as PDO is more complex than just
     * combining raw query and arguments), but it does the job.
     *
     * @author Panique
     * @param string $raw_sql
     * @param array $parameters
     * @return string
     */
    static public function debugPDO($raw_sql, $parameters) {

        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {

            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }

        /*
        echo "<br> [DEBUG] Keys:<pre>";
        print_r($keys);

        echo "\n[DEBUG] Values: ";
        print_r($values);
        echo "</pre>";
        */

        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }

    static public function getSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        return $_SESSION['session'];
    }

    static public function startSession($data){
        /*if($privilege!=1) {
            $u1 = new MySqlTable();
            $sql = "UPDATE ".$GLOBALS['db_table']['users']." SET last_connect='".date('Y-m-d H:i:s')."' WHERE id='".$user_id."'";
            $u1->executeQuery($sql);
        }*/

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['session']['user_id'] = $data['user_id'];
        $_SESSION['session']['name'] = $data['name'];
        $_SESSION['session']['username'] = $data['username'];
        $_SESSION['session']['email'] = $data['email'];
        $_SESSION['session']['privilege'] = $data['privilege'];
        $_SESSION['session']['start'] = $data['start'];
        $_SESSION['session']['expire'] = $data['expire'];
    }

    static public function verifyUserSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(!Helper::sessionIsLive()) {
            header('Location: '.URL);
        }
    }

    static public function sessionIsLive() {
        if(isset($_SESSION['session']['user_id']) AND $_SESSION['session']['user_id']!='' ) return true;
        else return false;
    }

    static public function killSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['session'] = array();
        unset($_SESSION);
    }

    static public function updateLastLogin($user_id, $time){
        $User = new User();

        if($User->updateLastLogin($user_id, $time)){
            return true;
        }else{
            return false;
        }
    }

    static public function stripTags($variables, $allowedTags = null){
        if(is_array($variables)){
            $result = array();
            foreach ($variables as $key => $value){
                $result[$key] = strip_tags($value, $allowedTags);
            }
            return $result;
        }else{
            return strip_tags($variables, $allowedTags);
        }
    }

    static public function limitEcho($text, $length){
        if(strlen($text)<=$length) {
            echo $text;
        } else {
            $y=substr($text,0,$length) . '...';
            echo $y;
        }
    }

}