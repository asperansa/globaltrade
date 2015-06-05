<?
class CLinkGenerating {
	function OnAfterBannerUpdateOrAddHandler(&$arFields) {
		if (!$arFields) return;
		if ($arFields['IBLOCK_ID'] == 5) {
            CModule::IncludeModule('iblock');
			$arSelect = array(
				"PROPERTY_HEADER"
			);
			$arFilter = array(
				'ID'        => $arFields['ID'],
				'IBLOCK_ID' => $arFields['IBLOCK_ID']
			);			
			$rsResultElement = CIBlockElement::GetList(array("asc" => "ID"), $arFilter, false, false, $arSelect);
			if($arResultElement = $rsResultElement->Fetch()) {
				$db_props = CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $arResultElement['ID'], array('sort' => 'asc'), array('CODE' => 'LINK_ADV'));
				if($ar_props = $db_props->Fetch()) {
					CIBlockElement::SetPropertyValues($arResultElement['ID'], $arFields['IBLOCK_ID'], '/?action=banner'.$arResultElement['ID'], 'LINK_ADV');
				}	
			}
		}
		return true;
	}
}