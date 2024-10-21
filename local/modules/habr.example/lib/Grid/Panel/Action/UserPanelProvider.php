<?php

namespace Habr\Example\Grid\Panel\Action;

use Bitrix\Main\Grid\Panel\Action\DataProvider;

final class UserPanelProvider extends DataProvider
{
	public function prepareActions(): array
	{
		return [
			new EditAction(),
			new GroupAction(),
		];
	}
}
