<?php

declare(strict_types=1);

namespace ChrisHarrison\Entities;

interface Entity
{
    /**
     * @return EntityId
     */
    public function id(): EntityId;

    /**
     * @param Entity $entity
     * @return bool
     */
    public function isSame(Entity $entity): bool;

    /**
     * @param array $native
     * @return mixed
     */
    public static function fromNative(array $native);

    /**
     * @return array
     */
    public function toNative(): array;
}
