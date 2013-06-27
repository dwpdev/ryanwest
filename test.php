<?php

class User {
     private $db;
     public $first_name;
     public $last_name;
     public $email;

    function __construct($db, $values = NULL) {
        $this->db = $db;
        if($values != null){
            foreach ($values as $var => $value){
                $this->$var = $value;
            }
        }
    }


}

class Crud extends User{
    
    function create(){
        if($this->id == NULL && first_name != NULL && last_name != null && emial != NULL){
          $query = "INSERT INTO table USERS id, first_name, last_name, email, active 
                    VALUES ('".$this->first_name."', '".$this->last_name."', '".$this->emial."', '1')";
          
          $rs = $this->db->Execute($query);
          $rs->close();
        }
        
    }
    
    function readAll($db, $where, $order_by){
       $all_users = array();
       $query = "SELECT * FROM USERS $where $order_by";
       $this->$db->Execute($query);
       while ( !$rs->EOF ) {
            $all_users[] = new Member($db, array(
                'id' => $rs->Fields['id']->Value,
                'first_name' => urldecode($rs->Fields['first_name']->Value),
                'last_name' => urldecode($rs->Fields['last_name']->Value),
            ));
        $rs->MoveNext();
        }
        $rs->Close();
        return $all_users;
    }
    
    function readById($db, $id){
        $users = Member::retrieveAll($db, "WHERE member_id='$id'");
        if ( count($users) == 0) {
            return null;
        }
    return $users[0];
    }
    
    function update($where){
        
        
        $query = "UPDATE USERS $where";
        
        $this->db->Execute($query);
        
        if(!$this->db->Execute($query)){
            return false;
        }
        return true;
    }
    function delete($id){
        
     $query = "DELETE FROM USERS WHERE id = '".$id."'";
     if($id == null){
         return false;
     }
     
     if($this->db->Execute($query)){
         return false;
     }

    }
}

class MailingList extends Crud{
    
    function readAllMailingList(){
        $where = array();
        $order_by = $rs->Fields['last_name'];
        parent::readAll($db, $where, $order_by);
    }
    
    function readMailingListById(){
        
        $id = $this->id;
        parent::readById($db, $id);
    }
    
    function addToMailingList(){
        
        $where = array("email"=>$this->email);
        parent::update($where);
    }
}

?>
