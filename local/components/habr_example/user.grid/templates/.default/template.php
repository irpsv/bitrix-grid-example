<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */

if (isset($arResult['~FILTER']))
{
	$componentParams = \Bitrix\Main\Filter\Component\ComponentParams::get(
		$arResult['~FILTER']
	);
	if (\Bitrix\Main\Loader::includeModule('intranet'))
	{
		\Bitrix\UI\Toolbar\Facade\Toolbar::addFilter($componentParams);
	}
	else
	{
		$APPLICATION->IncludeComponent(
			'bitrix:main.ui.filter',
			'',
			$componentParams,
		);
	}
}

/**
 * @var \Habr\Example\Grid\UserGrid $grid
 */
$grid = $arResult['~GRID'];

$APPLICATION->IncludeComponent(
	'bitrix:main.ui.grid',
	'',
	\Bitrix\Main\Grid\Component\ComponentParams::get($grid),
);

?>
<script>
	BX.ready(function() {
		// для простой работы в обработчиках действий грида, см. пример Habr\Example\Grid\Panel\Action\Group\FireAction::getOnchange
		window.UserGrid = BX.Main.gridManager.getInstanceById('<?= $grid->getId() ?>');
	});
</script>
