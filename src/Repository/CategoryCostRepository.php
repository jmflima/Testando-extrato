<?php
declare(strict_types=1);

namespace SONFin\Repository;

class CategoryCostRepository extends DefaultRepository implements CategoryCostRepositoryInterface
{

	public function __construct()
	{
		parent::__construct(categoryCost::class);
	}

	{
		public function sumByPeriod(string $dateStart, $dateEnd, int $userId): array;
			
	}
			
}