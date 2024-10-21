<?php

namespace Habr\Example\Grid\Column;

use Bitrix\Main\Grid\Column\Columns;
use Bitrix\Main\Grid\Column\DataProvider\TabletColumnsProvider;
use Bitrix\Main\Grid\Column\DataProvider\UfColumnsProvider;
use Bitrix\Main\ORM\Entity;

final class UserColumns extends Columns
{
	public function __construct(Entity $entity)
	{
		parent::__construct(
			new TabletColumnsProvider(
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
					'ACTIVE',
					'LOGIN',
					'EMAIL',
					'NAME',
					'LAST_NAME',
					'DATE_REGISTER',
				],
			),
			new UfColumnsProvider(
				$entity->getUfId(),
			),
		);
	}

	/**
	 * @param \Bitrix\Main\Grid\Column\Column[] $columns
	 */
	protected function prepareColumns(array $columns): array
	{
		$necessaryColumns = [
			'ID',
			'ACTIVE',
		];

		foreach ($columns as $column)
		{
			if (in_array($column->getId(), $necessaryColumns))
			{
				$column->setNecessary(true);
			}
		}

		return $columns;
	}
}
