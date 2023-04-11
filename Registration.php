<?php
$RegustrationUser = filter_input(INPUT_POST,'RegistrationUser');
$RegestrationPassword = filter_input(INPUT_POST,'RegistrationPassword');
$RegestrationPasswordRepeat = filter_input(INPUT_POST,'RegistrationPasswordRepeat');
if (!empty($RegustrationUser and $RegestrationPassword)){
    $serverName = "193.138.130.179, 16529";
    $serverUser = "asis";
    $serverPass = "OZ0i90";
    if (empty($telephoneuser))
    {
        $telephoneuser="Anonymous";
    }
    $connectionInfo = array( "Database"=>"ASISSIte", "UID"=>$serverUser, "PWD"=>$serverPass, "CharacterSet" => "UTF-8");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if( $conn ) {
        $query = "INSERT Into Orders(CurrentDateTelephone,Telephone,TelephoneUser,TelephoneMessage) VALUES (?,?,?,?)";
        $params = array($Date,$telephone,$telephoneuser,$TelephoneMessage);
        $stmt = sqlsrv_query($conn,$query,$params);
        }
    else{
        die('Something went wrong while connecting to MSSQL');
        }
}
?>