<?php

namespace Habr\Example\Grid\Panel\Action;

use Habr\Example\Grid\Panel\Action\Group\FireAction;
use Habr\Example\Grid\Panel\Action\Group\HireAction;

final class GroupAction extends \Bitrix\Main\Grid\Panel\Action\GroupAction
{
	protected function prepareChildItems(): array
	{
		return [
			new HireAction(),
			new FireAction(),
		];
	}
}
