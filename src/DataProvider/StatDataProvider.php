<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Entity\Stat;
use App\Entity\Stock;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

final class StatDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface, ItemDataProviderInterface
{
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Stat::class;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        return $this->getItemsStat();
    }

    /**
     * Retrieves an item.
     *
     * @param array|int|object|string $id
     *
     * @return array
     * @throws ResourceClassNotSupportedException
     *
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        return $this->getItemsStat($id);
    }

    private function getItemsStat($id = null)
    {
        $manager = $this->managerRegistry->getManagerForClass(User::class);
        $res = $manager->getRepository(Stock::class)->getStats($id);
        $items = [];
        foreach ($res as $ele) {
            $items[] = new Stat($ele['idStock'], $ele['nbr_gifts'], 12, $ele['avg_price'], $ele['min_price'], $ele['max_price']);
        }

        return $items;
    }
}