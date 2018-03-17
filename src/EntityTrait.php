<?php

declare(strict_types=1);

namespace ChrisHarrison\Entities;

use Funeralzone\ValueObjects\ValueObject;

trait EntityTrait
{
    /**
     * @param Entity $entity
     * @return bool
     */
    public function isSame(Entity $entity): bool
    {
        return ($this->toNative() == $entity->toNative());
    }

    /**
     * @return array
     */
    public function toNative(): array
    {
        return array_map(function (ValueObject $value) {
            return $value->toNative();
        }, $this->propertiesToArray());
    }

    /**
     * @return array
     */
    private function propertiesToArray(): array
    {
        return get_object_vars($this);
    }
}
