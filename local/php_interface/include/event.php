<?
//lvl2-1    
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "CheckDeactivate");
function CheckDeactivate(&$arFields) {
    $iblockId = 2; 
    if ($arFields["IBLOCK_ID"] == $iblockId) {

        if (isset($arFields["ACTIVE"]) && $arFields["ACTIVE"] == "N") {
            $elementId = $arFields["ID"];
            $res = CIBlockElement::GetList([], ["ID" => $elementId], false, false, ["SHOW_COUNTER"]);
            if ($arElement = $res->Fetch()) {
                $showCounter = (int)$arElement["SHOW_COUNTER"];
                if ($showCounter > 2) {
                    global $APPLICATION;
                    $APPLICATION->ThrowException("Товар невозможно деактивировать, у него больше" . $showCounter . " просмотров");
                    return false; 
                }
            }
        }
    }
}
//lvl2-2
use Bitrix\Main\EventManager;
use Bitrix\Main\Mail\Event;


function getContentEditors() {
    $users = [];
    $groupUsers = CUser::GetList($by = "id", $order = "asc", ["GROUPS_ID" => 5]);
    while ($user = $groupUsers->Fetch()) {
        $users[] = $user['EMAIL'];
    }
    return $users;
}
function notifyGroupEditors($userId) {
    $user = CUser::GetByID($userId)->Fetch();
    if (!$user) return;
    $editors = getContentEditors();
    foreach ($editors as $editorEmail) {
        $event=["EMAIL_TO" => $editorEmail,
                "USER_ID"=>$user['ID'],
                "USER_NAME"=>$user['NAME'],
                "USER_EMAIL"=>$user['EMAIL'],];
        \Bitrix\Main\Mail\Event::send([
            "EVENT_NAME" => "GROUP_EDITORS_ADD_USER",
            'MESSAGE_ID' => 44,
            "LID" => "s1", 
            "C_FIELDS" => $event
   
        ]);
    }
}

EventManager::getInstance()->addEventHandler('main', 'OnAfterUserAdd', 'onUserUpdated');
EventManager::getInstance()->addEventHandler('main', 'OnBeforeUserUpdate', 'onUserUpdated');


function onUserUpdated(&$arFields) {
    if (isset($arFields['GROUP_ID'])) {
        foreach( $arFields['GROUP_ID'] as $gr){
        if ($gr['GROUP_ID']==5) {
            notifyGroupEditors($arFields['ID']);
            break;
        }
    }
    }
}