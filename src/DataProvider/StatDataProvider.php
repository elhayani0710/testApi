<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Entity\Stock;

final class StockDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface,ItemDataProviderInterface
{
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Stock::class;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        return 'tesssss';
    }

    /**
     * Retrieves an item.
     *
     * @param array|int|object|string $id
     *
     * @return object|null
     * @throws ResourceClassNotSupportedException
     *
     */public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
{
    return 'tessssst' . $id;
}
}