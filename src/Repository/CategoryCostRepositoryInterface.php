<?php
declare(strict_types=1);
namespace SONFin\Repository;

Interface CategoryCostRepositoryInterface extends RepositoryInterface
{
	public function sumByPeriod(string $dateStart, $dateEnd, int $userId): array;
	
		
}
