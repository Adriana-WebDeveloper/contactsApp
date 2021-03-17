<?php
class FileUserAccess
{
    public static function validatePassword($inputUser, $inputPassword) {
        if (file_exists("data/users.csv")){
            $handle = fopen("data/users.csv", "r");
            if ($handle){
                while (!feof($handle)){
                    $user = fgetcsv($handle);
                    if ($inputUser == $user[0] && $inputPassword == $user[1] ){
                        fclose($handle);
                        return true;
                    }
                }
                fclose($handle);
            }
        }
        return false;
        
    } 
}
