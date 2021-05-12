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
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'adminkcb' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'Rosangela' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'budokaisp' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'dokyokushinlavras' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'seishincajamar' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'senshikaiipero' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'shidokanheliopolis' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'shidokanmatriz' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'sokyokushincaragua' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'sokyokushintaubate' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'toeikanembu' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'toeikanmogisuzano' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'toeikansp' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'toeikanguararema' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'cobrakai' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'fkcombat' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'sonodaabc' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'sonodasantoandre' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    ,
    'sonodabrasil' => 
        array('todobanco' => new PermissionSet(false, false, false, false),
        'todosinscritos' => new PermissionSet(false, false, false, false),
        'staff' => new PermissionSet(false, false, false, false),
        'todosinscritos01' => new PermissionSet(false, false, false, false),
        'budokaisp' => new PermissionSet(false, false, false, false),
        'cobrakaisonoda' => new PermissionSet(false, false, false, false),
        'dokyokushinlavras' => new PermissionSet(false, false, false, false),
        'fkcombatgua' => new PermissionSet(false, false, false, false),
        'heikokaiabc' => new PermissionSet(false, false, false, false),
        'heikokaisantoandre' => new PermissionSet(false, false, false, false),
        'seishincajamar' => new PermissionSet(false, false, false, false),
        'senshikaiipero' => new PermissionSet(false, false, false, false),
        'shidokanheliopolis' => new PermissionSet(false, false, false, false),
        'shidokanmatriz' => new PermissionSet(false, false, false, false),
        'sokyokushincaragua' => new PermissionSet(false, false, false, false),
        'sokyokushintaubate' => new PermissionSet(false, false, false, false),
        'sonodasorocaba' => new PermissionSet(false, false, false, false),
        'toeikanembu' => new PermissionSet(false, false, false, false),
        'toeikanguararema' => new PermissionSet(false, false, false, false),
        'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
        'toeikansp' => new PermissionSet(false, false, false, false),
        'teoikanmogisuzano' => new PermissionSet(false, false, false, false),
        'usuarios' => new PermissionSet(false, false, false, false),
        'notaarbitragem' => new PermissionSet(false, false, false, false),
        'integranteskcb' => new PermissionSet(false, false, false, false))
    );

$appGrants = array('guest' => new PermissionSet(false, false, false, false),
    'defaultUser' => new PermissionSet(false, false, false, false),
    'adminkcb' => new AdminPermissionSet(),
    'Rosangela' => new PermissionSet(true, false, false, false),
    'budokaisp' => new PermissionSet(false, false, false, false),
    'dokyokushinlavras' => new PermissionSet(false, false, false, false),
    'seishincajamar' => new PermissionSet(false, false, false, false),
    'senshikaiipero' => new PermissionSet(false, false, false, false),
    'shidokanheliopolis' => new PermissionSet(false, false, false, false),
    'shidokanmatriz' => new PermissionSet(false, false, false, false),
    'sokyokushincaragua' => new PermissionSet(false, false, false, false),
    'sokyokushintaubate' => new PermissionSet(false, false, false, false),
    'toeikanembu' => new PermissionSet(false, false, false, false),
    'toeikanmogisuzano' => new PermissionSet(false, false, false, false),
    'toeikansp' => new PermissionSet(false, false, false, false),
    'toeikanguararema' => new PermissionSet(false, false, false, false),
    'cobrakai' => new PermissionSet(false, false, false, false),
    'fkcombat' => new PermissionSet(false, false, false, false),
    'sonodaabc' => new PermissionSet(false, false, false, false),
    'sonodasantoandre' => new PermissionSet(false, false, false, false),
    'sonodabrasil' => new PermissionSet(false, false, false, false));

$dataSourceRecordPermissions = array();

$tableCaptions = array('todobanco' => 'Relação geral de cadastrados',
'todosinscritos' => 'Inscritos para KATA',
'staff' => 'Staff',
'todosinscritos01' => 'EXPORTAÇÃO dos inscritos',
'budokaisp' => 'Budokaisp',
'cobrakaisonoda' => 'Cobrakaisonoda',
'dokyokushinlavras' => 'Dokyokushinlavras',
'fkcombatgua' => 'Fkcombatgua',
'heikokaiabc' => 'Heikokaiabc',
'heikokaisantoandre' => 'Heikokaisantoandre',
'seishincajamar' => 'Seishincajamar',
'senshikaiipero' => 'Senshikaiipero',
'shidokanheliopolis' => 'Shidokanheliopolis',
'shidokanmatriz' => 'Shidokanmatriz',
'sokyokushincaragua' => 'Sokyokushincaragua',
'sokyokushintaubate' => 'Sokyokushintaubate',
'sonodasorocaba' => 'Sonodasorocaba',
'toeikanembu' => 'Toeikanembu',
'toeikanguararema' => 'Toeikanguararema',
'toeikanmogisuzano' => 'Toeikanmogisuzano',
'toeikansp' => 'Toeikansp',
'teoikanmogisuzano' => 'Teoikanmogisuzano',
'usuarios' => 'Usuarios',
'notaarbitragem' => 'Notaarbitragem',
'integranteskcb' => 'Integranteskcb');

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
