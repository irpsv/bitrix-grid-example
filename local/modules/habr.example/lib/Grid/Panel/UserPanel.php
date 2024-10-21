<?php

namespace Habr\Example\Grid\Panel;

use Bitrix\Main\Grid\Panel\Panel;
use Habr\Example\Grid\Panel\Action\UserPanelProvider;

final class UserPanel extends Panel
{
	public function __construct()
	{
		parent::__construct(
			new UserPanelProvider(),
		);
	}
}
