<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if ($arResult["isFormNote"] != "Y" && $arResult["isFormErrors"] != "Y") {?>
    <form name="<?=$arResult["arForm"]["SID"]?>" action="?" method="POST" enctype="multipart/form-data" class="form-ajax">
        <input type="hidden" name="sessid" id="sessid" value="<?=bitrix_sessid()?>">
        <input type="hidden" name="WEB_FORM_ID" value="<?=$arParams["WEB_FORM_ID"]?>">

        <?if ($arResult["isFormTitle"] == "Y"){?>
            <div class="f-ttl"><?=$arResult["FORM_TITLE"]?></div>
        <?}?>

        <?if ($arResult["isFormDescription"] == "Y"){?>
            <div class="f-dsc"><?=$arResult["FORM_DESCRIPTION"]?></div>
        <?}?>

        <?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
            $tagName = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];
            ?>
            <div class="field">
                <input type="text" placeholder="<?=$arQuestion["CAPTION"]?>" name="<?=$tagName?>"/>
            </div>
        <?}?>
        <div class="action">
            <input type="hidden" name="web_form_apply" value="Y" />
            <button type="submit"><?=$arResult["arForm"]["BUTTON"]?></button>
        </div>
    </form>
<?}elseif($arResult["isFormNote"] == "Y"){
    $APPLICATION->RestartBuffer();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["note"=>$arResult["FORM_NOTE"]]);
    die();
}elseif($arResult["isFormErrors"] == "Y"){
    $APPLICATION->RestartBuffer();
    header('Content-Type: application/json; charset=utf-8');
    foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
        $tagName = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["QUESTION_ID"];

        if ( !is_null($arResult["FORM_ERRORS"][$FIELD_SID]) )
            $arError["error"][$tagName] = $arResult["FORM_ERRORS"][$FIELD_SID];
    }
    echo json_encode($arError);

    die();
}?>