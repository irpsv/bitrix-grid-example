<?php

namespace Habr\Example\Grid\Row\Action;

use Bitrix\Main\Grid\Row\Action\DataProvider;

final class UserContextActionDataProvider extends DataProvider
{
	public function prepareActions(): array
	{
		return [
			new FireAction(),
			new HireAction(),
		];
	}
}
