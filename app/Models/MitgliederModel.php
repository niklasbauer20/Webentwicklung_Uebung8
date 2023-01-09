<?php
namespace App\Models;
use CodeIgniter\Model;

class MitgliederModel extends Model
{
    public function login(){
        $this->personen= $this->db->table('mitglieder');
        $this->personen->select('*');
        $this->personen->where('mitglieder.e-mail', $_POST['email']);
        $result= $this->personen->get();

        return $result->getRowArray();
    }


 public function getData( $id = NULL){
    $this->personen=$this->db->table('mitglieder');
    $this->personen->select('*');

    if ($id!=NULL){
        $this->personen->where('id',$id);
        $result= $this->personen->get();
        return $result->getRowArray();
    }
    $this->personen->orderBy('username');
     $result= $this->personen->get();
     return $result->getResultArray();

 }

    public function createmitglied() {
        $this->personen = $this->db->table('mitglieder');
        $this->personen->insert(array('username' => $_POST['username'],
            'e-mail' => $_POST['email'],
            'passwort' => password_hash($_POST['passwort'], PASSWORD_DEFAULT)));
    }

    public function updatemitglied() {

        $this->personen = $this->db->table('mitglieder');
        $this->personen->where('mitglieder.id', $_POST['id']);
        if ($_POST['passwort']==''|| !isset($_POST['passwort'])){
            $this->personen->update(array('username' => $_POST['username'],
                'e-mail' => $_POST['email']));
        }else{
            $this->personen->update(array('username' => $_POST['username'],
                'e-mail' => $_POST['email'],
                'passwort' => password_hash($_POST['passwort'], PASSWORD_DEFAULT)));
        }

    }
    public function deletemitglied() {
        $this->personen = $this->db->table('mitglieder');
        $this->personen->where('mitglieder.id', $_POST['id']);
        $this->personen->delete();
    }




}