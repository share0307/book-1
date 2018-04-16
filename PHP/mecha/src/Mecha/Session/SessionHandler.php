<?php
namespace Mecha\Session;

/**
 *
 * Class SessionHandler
 * @package Mecha\Session
 */

class SessionHandler implements \SessionHandlerInterface
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function read($session_id)
    {
        echo __METHOD__ . PHP_EOL;

        return (string)$this->db->selectFetchColumn(function(){
            return "SELECT session_data FROM session 
                      WHERE session_id=:session_id";
        },[
            ":session_id" => $session_id
        ]);
    }

    public function write($session_id, $session_data)
    {
        echo __METHOD__ . PHP_EOL;

        $time = date("Y-m-d H:i:s");

        return $this->db->insert(function () use ($time,$session_id,$session_data){
            return "INSERT INTO session 
                      (session_id, session_data, created_at,updated_at)
                      VALUES (:session_id, :session_data,:created_at,:updated_at)";
        },[
            ":session_id" => $session_id,
            ":session_data" => $session_data,
            ":created_at" => $time,
            ":updated_at" => $time
        ]);
    }

    public function open($save_path, $session_name)
    {
        echo __METHOD__ . PHP_EOL;

        return true;
    }

    public function close()
    {
        echo __METHOD__ . PHP_EOL;

        return true;
    }

    public function destroy($session_id)
    {
        echo __METHOD__ . PHP_EOL;

        return $this->db->delete(function () use ($session_id){
            return "DELETE FROM session
                      WHERE session_id=:session_id";
        },[
            ":session_id" => $session_id
        ]);
    }

    public function gc($maxlifetime)
    {
        echo __METHOD__ . PHP_EOL;

        $time = date('Y-m-d H:i:s', $maxlifetime);
        return $this->db->delete(function () use ($time){
            return "DELETE FROM session
                      WHERE created_at=:created_at";
        },[
            ":created_at" => $time
        ]);
    }
}