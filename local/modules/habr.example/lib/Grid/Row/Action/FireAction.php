<?php

namespace Habr\Example\Grid\Row\Action;

use Bitrix\Main\Error;
use Bitrix\Main\Grid\Row\Action\BaseAction;
use Bitrix\Main\Grid\Row\Action\Control\SendRowActionOnclick;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Result;

final class FireAction extends BaseAction
{
	public static function getId(): ?string
	{
		return 'fire';
	}

	protected function getText(): string
	{
		return Loc::getMessage('HABR_EXAMPLE_GRID_ROW_ACTION_FIRE_TEXT');
	}

	public function getControl(array $rawFields): ?array
	{
		if ($rawFields['ACTIVE'] !== 'Y')
		{
			return null;
		}

		$this->onclick = (string) new SendRowActionOnclick($this, [
			'id' => $rawFields['ID'],
		]);

		return parent::getControl($rawFields);
	}

	public function processRequest(HttpRequest $request): ?Result
	{
		$result = new Result();
		$result->addError(
			new Error(
				Loc::getMessage('HABR_EXAMPLE_GRID_ROW_ACTION_FIRE_PROCESS_REQUEST_ERROR')
			)
		);

		return $result;
	}
}
