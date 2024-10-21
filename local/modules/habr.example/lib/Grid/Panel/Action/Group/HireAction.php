<?php

namespace Habr\Example\Grid\Panel\Action\Group;

use Bitrix\Main\Filter\Filter;
use Bitrix\Main\Grid\Panel\Action\Group\GroupChildAction;
use Bitrix\Main\Grid\Panel\Snippet\Onchange;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Result;

final class HireAction extends GroupChildAction
{
	public static function getId(): string
	{
		return 'hire';
	}

	public function getName(): string
	{
		return Loc::getMessage('HABR_EXAMPLE_GRID_PANEL_ACTION_GROUP_HIRE_NAME');
	}

	public function processRequest(HttpRequest $request, bool $isSelectedAllRows, ?Filter $filter): ?Result
	{
		return null;
	}

	protected function getOnchange(): Onchange
	{
		return new Onchange();
	}
}
