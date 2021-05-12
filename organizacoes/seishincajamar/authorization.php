<?php

include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
include_once dirname(__FILE__) . '/' . 'components/application.php';
include_once dirname(__FILE__) . '/' . 'components/security/permission_set.php';
include_once dirname(__FILE__) . '/' . 'components/security/user_authentication/table_based_user_authentication.php';
include_once dirname(__FILE__) . '/' . 'components/security/grant_manager/hard_coded_user_grant_manager.php';
include_once dirname(__FILE__) . '/' . 'components/security/table_based_user_manager.php';
include_once dirname(__FILE__) . '/' . 'components/security/user_identity_storage/user_identity_session_storage.php';
include_once dirname(__FILE__) . '/' . 'components/security/recaptcha.php';
include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';

$grants = array('guest' => 
        array()
    ,
    'defaultUser' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'seishincajamar' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'adminkcb' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'budokaisp' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'cobrakaisonoda' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'dokyokushinlavras' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'fkcombatgua' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'heikokaiabc' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'heikokaisantoandre' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'Rosangela' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'senshikaiipero' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'shidokanheliopolis' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'shidokanmatriz' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'sokyokushincaragua' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'sokyokushintaubate' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'sonodasorocaba' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'toeikanembu' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'toeikanmogisuzano' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'toeikansp' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    ,
    'toeikanguararema' => 
        array('seishincajamar' => new PermissionSet(false, false, false, false))
    );

$appGrants = array('guest' => new PermissionSet(false, false, false, false),
    'defaultUser' => new PermissionSet(false, false, false, false),
    'seishincajamar' => new PermissionSet(true, true, true, true),
    'adminkcb' => new AdminPermissionSet(),
    'budokaisp' => new PermissionSet(false, false, false, false),
    'cobrakaisonoda' => new PermissionSet(false, false, false, false),
    'dokyokushinlavras' => new PermissionSet(false, false, false, false),
    'fkcombatgua' => new PermissionSet(false, false, false, false),
    'heikokaiabc' => new PermissionSet(false, false, false, false),
    'heikokaisantoandre' => new PermissionSet(false, false, false, false),
    'Rosangela' => new PermissionSet(true, true, true, true),
    'senshikaiipero' => new PermissionSet(false, false, false, false),
    'shidokanheliopolis' => new PermissionSet(false, false, false, false),
    'shidokanmatriz' => new PermissionSet(false, false, false, false),
    'sokyokushincaragua' => new PermissionSet(false, false, false, false),
    'sokyokushintaubate' => new PermissionSet(false, false, false, false),
    'sonodasorocaba' => new PermissionSet(false, false, false, false),
    'toeikanembu' => new PermissionSet(false, false, false, false),
    'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
    'toeikansp' => new PermissionSet(false, false, false, false),
    'toeikanguararema' => new PermissionSet(false, false, false, false));

$dataSourceRecordPermissions = array();

$tableCaptions = array('seishincajamar' => 'Inscrição de atletas em campeonatos do sistema KCB/CBKI');

$usersTableInfo = array(
    'TableName' => 'usuarios',
    'UserId' => 'user id',
    'UserName' => 'username',
    'Password' => 'password',
    'Email' => '',
    'UserToken' => '',
    'UserStatus' => ''
);

function EncryptPassword($password, &$result)
{

}

function VerifyPassword($enteredPassword, $encryptedPassword, &$result)
{

}

function BeforeUserRegistration($userName, $email, $password, &$allowRegistration, &$errorMessage)
{

}    

function AfterUserRegistration($userName, $email)
{

}    

function PasswordResetRequest($userName, $email)
{

}

function PasswordResetComplete($userName, $email)
{

}

function VerifyPasswordStrength($password, &$result, &$passwordRuleMessage) 
{

}

function CreatePasswordHasher()
{
    $hasher = CreateHasher('');
    if ($hasher instanceof CustomStringHasher) {
        $hasher->OnEncryptPassword->AddListener('EncryptPassword');
        $hasher->OnVerifyPassword->AddListener('VerifyPassword');
    }
    return $hasher;
}

function CreateGrantManager() 
{
    global $grants;
    global $appGrants;
    
    return new HardCodedUserGrantManager($grants, $appGrants);
}

function CreateTableBasedUserManager() 
{
    global $usersTableInfo;

    $userManager = new TableBasedUserManager(MySqlIConnectionFactory::getInstance(), GetGlobalConnectionOptions(), 
        $usersTableInfo, CreatePasswordHasher(), false);
    $userManager->OnVerifyPasswordStrength->AddListener('VerifyPasswordStrength');

    return $userManager;
}

function GetReCaptcha($formId) 
{
    return null;
}

function SetUpUserAuthorization() 
{
    global $dataSourceRecordPermissions;

    $hasher = CreatePasswordHasher();

    $grantManager = CreateGrantManager();

    $userAuthentication = new TableBasedUserAuthentication(new UserIdentitySessionStorage(), false, $hasher, CreateTableBasedUserManager(), true, false, false);

    GetApplication()->SetUserAuthentication($userAuthentication);
    GetApplication()->SetUserGrantManager($grantManager);
    GetApplication()->SetDataSourceRecordPermissionRetrieveStrategy(new HardCodedDataSourceRecordPermissionRetrieveStrategy($dataSourceRecordPermissions));
}
