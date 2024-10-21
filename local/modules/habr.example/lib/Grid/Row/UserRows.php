<?php

namespace Habr\Example\Grid\Row;

use Bitrix\Main\Grid\Row\Assembler\OnlyFieldsRowAssembler;
use Bitrix\Main\Grid\Row\Assembler\Field\UfFieldAssembler;
use Bitrix\Main\Grid\Row\Rows;
use Bitrix\Main\ORM\Entity;
use Habr\Example\Grid\Row\Action\UserContextActionDataProvider;

final class UserRows extends Rows
{
	public function __construct(array $visibleColumnIds, Entity $entity)
	{
		$rowAssembler = new OnlyFieldsRowAssembler(
			$visibleColumnIds,
			new UfFieldAssembler(
				$entity->getUfId(),
			),
		);

		parent::__construct(
			$rowAssembler,
			new UserContextActionDataProvider(),
		);
	}
}
