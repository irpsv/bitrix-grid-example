<?php

namespace Habr\Example\Grid\Panel\Action;

use Bitrix\Main\Error;
use Bitrix\Main\Filter\Filter;
use Bitrix\Main\HttpRequest;
use Bitrix\Main\Result;

final class EditAction extends \Bitrix\Main\Grid\Panel\Action\EditAction
{
	public function processRequest(HttpRequest $request, bool $isSelectedAllRows, ?Filter $filter): ?Result
	{
		$result = new Result();

		$rows = $this->getRequestRows($request);
		foreach ($rows as $row)
		{
			$id = $row['ID'];
			unset($row['ID']);

			$user = new \CUser();
			$user->Update($id, $row);
			if ($user->LAST_ERROR)
			{
				$result->addError(
					new Error($user->LAST_ERROR)
				);
			}
		}

		return $result;
	}
}
