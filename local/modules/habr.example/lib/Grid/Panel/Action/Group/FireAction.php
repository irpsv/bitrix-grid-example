<?php

namespace Habr\Example\Grid\Panel\Action\Group;

use Bitrix\Main\Error;
use Bitrix\Main\Filter\Filter;
use Bitrix\Main\Grid\Panel\Action\Group\GroupChildAction;
use Bitrix\Main\Grid\Panel\Actions;
use Bitrix\Main\Grid\Panel\Snippet;
use Bitrix\Main\Grid\Panel\Snippet\Onchange;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Result;
use Bitrix\Main\UserTable;
use CUser;

final class FireAction extends GroupChildAction
{
	public static function getId(): string
	{
		return 'fire';
	}

	public function getName(): string
	{
		return Loc::getMessage('HABR_EXAMPLE_GRID_PANEL_ACTION_GROUP_FIRE_NAME');
	}

	public function processRequest(HttpRequest $request, bool $isSelectedAllRows, ?Filter $filter): ?Result
	{
		$result = new Result();

		if ($isSelectedAllRows)
		{
			$filter = $filter?->getValue() ?? [];
		}
		else
		{
			$filter = [
				'@ID' => $this->getRequestRows($request),
			];
		}

		$rows = UserTable::getList([
			'select' => [
				'ID',
			],
			'filter' => $filter,
		]);
		foreach ($rows as $row)
		{
			$user = new CUser();
			$user->Update($row['ID'], [
				'ACTIVE' => 'N',
			]);
			if ($user->LAST_ERROR)
			{
				$result->addError(
					new Error($user->LAST_ERROR)
				);
			}
		}

		return $result;
	}

	protected function getOnchange(): Onchange
	{
		return new Onchange([
        	// сбрасываем панель от данных других кнопок
        	[
            	'ACTION' => Actions::RESET_CONTROLS,
        	],
        	// создаем кнопку
        	[
            	'ACTION' => Actions::CREATE,
            	'DATA' => [
                	// добавляем кнопку, которая выполняет JS код, который отправляет выбранные строки грида
                	(new Snippet)->getApplyButton([
                    	'ONCHANGE' => [
                        	[
                            	'ACTION' => Actions::CALLBACK,
                            	'DATA' => [
                                	[
                                    	'JS' => 'UserGrid.sendSelected()',
                                	]
                            	],
                        	],
                    	],
                	]),
            	],
        	],
    	]);
	}
}
