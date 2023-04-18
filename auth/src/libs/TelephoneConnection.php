<?php
$telephone = filter_input(INPUT_POST,'telephone');
$telephoneuser = filter_input(INPUT_POST,'telephoneUser');
$TelephoneMessage = filter_input(INPUT_POST,'TelephoneMessage');
$Date = new DateTime();
$Date->setTimezone(new DateTimeZone('Asia/Yekaterinburg'));
if (!empty($telephone and $TelephoneMessage)){
    $serverName = "193.138.130.179, 16529";
    $serverUser = "asis";
    $serverPass = "OZ0i90";
    if (empty($telephoneuser))
    {
        $telephoneuser="Anonymous";
    }
    $connectionInfo = array( "Database"=>"ASISSite", "UID"=>$serverUser, "PWD"=>$serverPass, "CharacterSet" => "UTF-8");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if( $conn ) {
        $query = "INSERT Into application(CurrentDateTelephone,Telephone,TelephoneUser,TelephoneMessage) VALUES (?,?,?,?)";
        $params = array($Date,$telephone,$telephoneuser,$TelephoneMessage);
        $stmt = sqlsrv_query($conn,$query,$params);
        }
    else{
        die('Something went wrong while connecting to MSSQL');
        }
}
?>