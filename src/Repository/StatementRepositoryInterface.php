<?php
declare(strict_types=1);
namespace SONFin\Repository;

Interface StatementRepositoryInterface
{
	public function all(string $dateStart, $dateEnd, int $userId): array;
	
		
}
