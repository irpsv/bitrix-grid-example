<?php
require $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php";

$APPLICATION->SetTitle("Список пользователей");
$APPLICATION->IncludeComponent(
	'habr_example:user.grid',
	'',
	[
		'AJAX_MODE' => 'Y',
		'AJAX_OPTION_JUMP' => 'N',
		'AJAX_OPTION_HISTORY' => 'N',
	],
);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";
