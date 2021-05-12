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
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'adminkcb' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'budokaisp' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'dokyokushinlavras' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'fkcombatgua' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'heikokaiabc' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'heikokaisantoandre' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'Rosangela' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'seishincajamar' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'senshikaiipero' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'shidokanheliopolis' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'shidokanmatriz' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'sokyokushincaragua' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'sokyokushintaubate' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'toeikanembu' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'toeikanmogisuzano' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'toeikansp' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'toeikanguararema' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'cobrakai' => 
        array('staff' => new PermissionSet(false, false, false, false))
    ,
    'sonodabrasil' => 
        array('staff' => new PermissionSet(false, false, false, false))
    );

$appGrants = array('guest' => new PermissionSet(false, false, false, false),
    'defaultUser' => new PermissionSet(false, false, true, false),
    'adminkcb' => new AdminPermissionSet(),
    'budokaisp' => new PermissionSet(true, false, true, false),
    'dokyokushinlavras' => new PermissionSet(true, false, true, false),
    'fkcombatgua' => new PermissionSet(true, false, true, false),
    'heikokaiabc' => new PermissionSet(true, false, true, false),
    'heikokaisantoandre' => new PermissionSet(true, false, true, false),
    'Rosangela' => new PermissionSet(true, true, true, true),
    'seishincajamar' => new PermissionSet(true, false, true, false),
    'senshikaiipero' => new PermissionSet(true, false, true, false),
    'shidokanheliopolis' => new PermissionSet(true, false, true, false),
    'shidokanmatriz' => new PermissionSet(true, false, true, false),
    'sokyokushincaragua' => new PermissionSet(true, false, true, false),
    'sokyokushintaubate' => new PermissionSet(true, false, true, false),
    'toeikanembu' => new PermissionSet(true, false, true, false),
    'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
    'toeikansp' => new PermissionSet(false, false, false, false),
    'toeikanguararema' => new PermissionSet(true, false, true, false),
    'cobrakai' => new PermissionSet(true, false, true, false),
    'sonodabrasil' => new PermissionSet(true, false, true, false));

$dataSourceRecordPermissions = array();

$tableCaptions = array('staff' => 'Arbitragem e Staff');

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
