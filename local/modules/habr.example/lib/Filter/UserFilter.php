<?php

namespace Habr\Example\Filter;

use Bitrix\Main\Filter\Filter;
use Bitrix\Main\Filter\Settings;
use Bitrix\Main\Filter\TabletDataProvider;
use Bitrix\Main\ORM\Entity;

final class UserFilter extends Filter
{
	public function __construct(string $gridId, Entity $entity)
	{
		parent::__construct(
			$gridId,
			new TabletDataProvider(
				new Settings([
					'ID' => $gridId,
				]),
				$entity,
				selectFields: [
					'ID',
					'ACTIVE',
					'LOGIN',
					'EMAIL',
					'NAME',
					'SECOND_NAME',
					'LAST_NAME',
					'DATE_REGISTER',
					'LAST_LOGIN',
				],
				defaultFields: [
					'ID',
					'ACTIVE',
					'LOGIN',
					'EMAIL',
					'NAME',
					'LAST_NAME',
					'DATE_REGISTER',
				],
			)
		);
	}
}
