<?php

namespace Habr\Example\Grid;

use Bitrix\Main\Filter\Filter;
use Bitrix\Main\Grid\Column\Columns;
use Bitrix\Main\Grid\Panel\Panel;
use Bitrix\Main\Grid\Row\Rows;
use Bitrix\Main\Grid\TabletGrid;
use Bitrix\Main\UserTable;
use Habr\Example\Grid\Column\UserColumns;
use Habr\Example\Filter\UserFilter;
use Habr\Example\Grid\Panel\UserPanel;
use Habr\Example\Grid\Row\UserRows;

final class UserGrid extends TabletGrid
{
	protected function getTabletClass(): string
	{
		return UserTable::class;
	}

	protected function createColumns(): Columns
	{
		return new UserColumns(
			$this->getEntity()
		);
	}

	protected function createRows(): Rows
	{
		return new UserRows(
			$this->getVisibleColumnsIds(),
			$this->getEntity()
		);
	}

	protected function createPanel(): Panel
	{
		return new UserPanel();
	}

	protected function createFilter(): Filter
	{
		return new UserFilter(
			$this->getId(),
			$this->getEntity(),
		);
	}
}
