<? 
class CPostMailing
{
    function AfterElementAddSendMail(&$arFields) {
		//error_log('$_POST '.print_r($_POST, true), 3, $_SERVER['DOCUMENT_ROOT'].'/local/logs/text.log');
		if ($arFields["IBLOCK_ID"] == 5) return;
		if ($arFields["IBLOCK_ID"] == 20) { #Форма обратной связи
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>20, "ACTIVE"=>"N");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
				$UTM = '';
				$UTM .= '<p>Информация была получена из формы: '.$_POST['location'].'</p>
				         <p>Время заявки: '.date("Y-m-d H:i:s").'</p>
						 <p>Канал кампании (utm_medium): '.$_POST['utm_medium'].'</p>
						 <p>Источник кампании (utm_source): '.$_POST['utm_source'].'</p>
						 <p>Название кампании (utm_campaign): '.$_POST['utm_campaign'].'</p>
						 <p>Ключевое слово кампании (utm_term): '.$_POST['utm_term'].'</p>
						 <p>Содержание кампании (utm_content): '.$_POST['utm_content'].'</p>
						 <p>Заголовок страницы (cm_title): '.$_POST['cm_title'].'</p>';
						 
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
					"PHONE" => ($arProps["PHONE"]["VALUE"]? "Позвоните по телефону <b>".$arProps["PHONE"]["VALUE"]."</b>" : ""),
					"PHONE_NUM" => $arProps["PHONE"]["VALUE"],
					"EMAIL_TO" => $arProps["EMAIL"]["VALUE"],
                    "EMAIL" => ($arProps["EMAIL"]["VALUE"]? ($arProps["PHONE"]["VALUE"]? " или напишите ": "Напишите ")."на почту <a href='mailto:'".$arProps["EMAIL"]["VALUE"]."'>".$arProps["EMAIL"]["VALUE"]."</a> для уточнения информации." : " для уточнения информации."),
					"TEXT" => ($arOb["PREVIEW_TEXT"]? " с комментарием: </p><p>". $arOb["PREVIEW_TEXT"].'</p>' : '.'),
					"TITLE" => (strlen($UTM)> 0 ? $UTM : "")
                );
                CEvent::Send("FEEDBACK", s1, $arEventFields);
            }
        }
		if ($arFields["IBLOCK_ID"] == 21) { #бесплатная консультация
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>21, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
				$UTM = '';
				$UTM .= '<p>Информация была получена из формы: '.$_POST['location'].'</p>
				         <p>Время заявки: '.date("Y-m-d H:i:s").'</p>
						 <p>Канал кампании (utm_medium): '.$_POST['utm_medium'].'</p>
						 <p>Источник кампании (utm_source): '.$_POST['utm_source'].'</p>
						 <p>Название кампании (utm_campaign): '.$_POST['utm_campaign'].'</p>
						 <p>Ключевое слово кампании (utm_term): '.$_POST['utm_term'].'</p>
						 <p>Содержание кампании (utm_content): '.$_POST['utm_content'].'</p>
						 <p>Заголовок страницы (cm_title): '.$_POST['cm_title'].'</p>';
						 
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
					"PHONE" => ($arProps["PHONE"]["VALUE"]? "Можете позвонить по телефону <b>".$arProps["PHONE"]["VALUE"]."</b> для уточнения информации." : ""),
					"TITLE" => (strlen($UTM)> 0 ? $UTM : "")
				);
                CEvent::Send("MAKE_FREE", s1, $arEventFields);
            }
        }
        if ($arFields["IBLOCK_ID"] == 3) { #Форма запись на прием
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>3, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
				$UTM = '';
				$UTM .= '<p>Информация была получена из формы: '.$_POST['location'].'</p>
				         <p>Время заявки: '.date("Y-m-d H:i:s").'</p>
						 <p>Канал кампании (utm_medium): '.$_POST['utm_medium'].'</p>
						 <p>Источник кампании (utm_source): '.$_POST['utm_source'].'</p>
						 <p>Название кампании (utm_campaign): '.$_POST['utm_campaign'].'</p>
						 <p>Ключевое слово кампании (utm_term): '.$_POST['utm_term'].'</p>
						 <p>Содержание кампании (utm_content): '.$_POST['utm_content'].'</p>
						 <p>Заголовок страницы (cm_title): '.$_POST['cm_title'].'</p>';
						 
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
					"PHONE" => ($arProps["PHONE"]["VALUE"]? "Можете позвонить по телефону <b>".$arProps["PHONE"]["VALUE"]."</b> для уточнения информации." : ""),
                    "TEXT" => ($arOb["PREVIEW_TEXT"]? " с комментарием: </p><p>". $arOb["PREVIEW_TEXT"].'</p>' : '.'),
					"TITLE" => (strlen($UTM)> 0 ? $UTM : "")
                );
                CEvent::Send("MAKE_ORDER", s1, $arEventFields);
            }
        }
		if ($arFields["IBLOCK_ID"] == 10) { #Форма задать вопрос
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>10, "ACTIVE"=>"N");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$UTM = '';
				$UTM .= '<p>Информация была получена из формы: '.$_POST['location'].'</p>
				         <p>Время заявки: '.date("Y-m-d H:i:s").'</p>
						 <p>Канал кампании (utm_medium): '.$_POST['utm_medium'].'</p>
						 <p>Источник кампании (utm_source): '.$_POST['utm_source'].'</p>
						 <p>Название кампании (utm_campaign): '.$_POST['utm_campaign'].'</p>
						 <p>Ключевое слово кампании (utm_term): '.$_POST['utm_term'].'</p>
						 <p>Содержание кампании (utm_content): '.$_POST['utm_content'].'</p>
						 <p>Заголовок страницы (cm_title): '.$_POST['cm_title'].'</p>';
				
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
                    "TEXT" => $arOb["PREVIEW_TEXT"],
					"TITLE" => (strlen($UTM)> 0 ? $UTM : "")
                );
                CEvent::Send("TAKE_QUESTION", s1, $arEventFields);
            }
        }
		if ($arFields["IBLOCK_ID"] == 9) { #Форма оставить отзыв
            $arOrder = Array("SORT"=>"ASC");
            $arFilter = Array("ID" => $arFields['ID'], "IBLOCK_ID"=>9, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array());
            while($ob = $res->GetNextElement()){
                $arOb = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
				$UTM = '';
				$UTM .= '<p>Информация была получена из формы: '.$_POST['location'].'</p>
				         <p>Время заявки: '.date("Y-m-d H:i:s").'</p>
						 <p>Канал кампании (utm_medium): '.$_POST['utm_medium'].'</p>
						 <p>Источник кампании (utm_source): '.$_POST['utm_source'].'</p>
						 <p>Название кампании (utm_campaign): '.$_POST['utm_campaign'].'</p>
						 <p>Ключевое слово кампании (utm_term): '.$_POST['utm_term'].'</p>
						 <p>Содержание кампании (utm_content): '.$_POST['utm_content'].'</p>
						 <p>Заголовок страницы (cm_title): '.$_POST['cm_title'].'</p>';
				
				$arEventFields = array(
					"ID" => $arOb["ID"],
                    "AUTHOR" => $arOb["NAME"],
					"DOCTOR" => ' ',
					"SERVICE" => ' ',
                    "TEXT" => $arOb["PREVIEW_TEXT"],
					"TITLE" => (strlen($UTM)> 0 ? $UTM : "")
                );
				if (isset($arProps["DOCTOR"]["VALUE"])) {
					$resDoctor = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("ID" => $arProps["DOCTOR"]["VALUE"], "IBLOCK_ID"=>6, "ACTIVE"=>"Y"), false, false, array('NAME'));
					while($arDoctor = $resDoctor->GetNext()) {
						$arEventFields["DOCTOR"] = ' о специалисте: '.$arDoctor["NAME"].'.';
					}
				}
				if (isset($arProps["SERVICE"]["VALUE"])) {
					$resService = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("ID" => $arProps["SERVICE"]["VALUE"], "IBLOCK_ID"=>4, "ACTIVE"=>"Y"), false, false, array('NAME'));
					while($arService = $resService->GetNext()) {
						$arEventFields["SERVICE"] = 'Было проведено '.$arService["NAME"].'.';
					}
				}
				CEvent::Send("TAKE_REVIEW", s1, $arEventFields);
            }
        }
    }
}