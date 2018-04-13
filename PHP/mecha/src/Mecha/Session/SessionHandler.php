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
        //var_dump($this->db->query("show tables"));
    }

    public function close()
    {
        return true;
    }

    public function destroy($session_id)
    {

    }

    public function gc($maxlifetime)
    {

    }

    public function open($save_path, $session_name)
    {
        return true;
    }

    public function read($session_id)
    {

    }

    public function write($session_id, $session_data)
    {
        $time = date("Y-m-d H:i:s");
        $this->db->insert(function () use ($time){
            return "INSERT INTO session 
                      SET session_id=:session_id, 
                          session_data=session_data,
                          created_at=:created_at
                          updated_at=:updated_at";
        },[
            ":session_id" => $session_id,
            ":session_data" => $session_data,
            ":created_at" => $time,
            ":updated_at" => $time
        ]);
    }
}