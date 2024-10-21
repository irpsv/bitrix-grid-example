<?php


use Bitrix\Main\Grid\Component\TabletGridComponent;
use Bitrix\Main\Grid\Grid;
use Bitrix\Main\Grid\Settings;
use Bitrix\Main\UserTable;
use Bitrix\Main\Loader;
use Habr\Example\Grid\UserGrid;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

final class UserGridComponent extends TabletGridComponent
{
	public function __construct($component = null)
	{
		parent::__construct($component);

		Loader::requireModule('habr.example');
	}

	protected function getTablet(): string
	{
		return UserTable::class;
	}

	protected function createGrid(): Grid
	{
		$settings = new Settings([
			'ID' => 'user-grid',
		]);

		$grid = new UserGrid($settings);

		return $grid;
	}
}
