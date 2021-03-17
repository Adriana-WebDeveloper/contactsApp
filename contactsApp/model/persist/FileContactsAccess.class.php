<?php
class FileContactsAccess
{
    public static function addContact($inputName, $inputEmail, $inputPhone, $logedUser) {
        $handle = fopen("data/".$logedUser."_contacts.csv", "a+");
        if ($handle){
            fwrite($handle, $inputName.",".$inputEmail.",".$inputPhone."\n");
            fclose($handle);
        }
        return false;
        
    } 

    public static function getContacts($logedUser) {
        $contacts = array();
        if (file_exists("data/".$logedUser."_contacts.csv")){
            $handle = fopen("data/".$logedUser."_contacts.csv", "r");
            if ($handle){
                while (!feof($handle)){
                    $user = fgetcsv($handle);
                    if($user){
                        array_push($contacts, $user);
                    }
                }
                fclose($handle);
            }
        }
        return $contacts;
        
    } 

}
