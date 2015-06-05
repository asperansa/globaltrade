<?require_once('include/CPostMailing.php');
require_once('include/CLinkGenerating.php');

//@desc почтовые сообщения с форм
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("CPostMailing", "AfterElementAddSendMail"));
// @decs генерим ссылку для контекстной рекламы
AddEventHandler('iblock', 'OnAfterIBlockElementAdd', array('CLinkGenerating', 'OnAfterBannerUpdateOrAddHandler'));
AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', array('CLinkGenerating', 'OnAfterBannerUpdateOrAddHandler'));

define('DEFAULT_TEMPLATE_PATH', '/local/templates/.default');
$curPage = $APPLICATION->GetCurPage(false);
CModule::IncludeModule('asperansa.helper');