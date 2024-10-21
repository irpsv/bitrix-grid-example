<?php

namespace Habr\Example\Grid\Row\Action;

use Bitrix\Main\Error;
use Bitrix\Main\Grid\Row\Action\BaseAction;
use Bitrix\Main\Grid\Row\Action\Control\SendRowActionOnclick;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Result;

final class HireAction extends BaseAction
{
	public static function getId(): ?string
	{
		return 'hire';
	}

	protected function getText(): string
	{
		return Loc::getMessage('HABR_EXAMPLE_GRID_ROW_ACTION_HIRE_TEXT');
	}

	public function getControl(array $rawFields): ?array
	{
		if ($rawFields['ACTIVE'] === 'Y')
		{
			return null;
		}

		$this->onclick = (string)new SendRowActionOnclick($this, [
			'id' => $rawFields['ID'],
		]);

		return parent::getControl($rawFields);
	}

	public function processRequest(HttpRequest $request): ?Result
	{
		$result = null;

		$userId = (int)$request->get('id');
		if ($userId > 0)
		{
			$user = new CUser();
			$user->Update($userId, [
				'ACTIVE' => 'Y',
			]);
			if ($user->LAST_ERROR)
			{
				$result = new Result();
				$result->addError(
					new Error($user->LAST_ERROR),
				);
			}
		}

		return $result;
	}
}
