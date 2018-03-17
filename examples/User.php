<?php

declare(strict_types=1);

namespace ChrisHarrison\Entities\Examples;

use ChrisHarrison\Entities\Entity;
use ChrisHarrison\Entities\EntityId;
use ChrisHarrison\Entities\EntityTrait;

final class User implements Entity
{
    use EntityTrait;

    private $id;
    private $name;

    public function __construct(UserId $id, Name $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function id(): EntityId
    {
        return $this->id;
    }

    public static function fromNative(array $native)
    {
        return new static(
            $native['id'],
            $native['name']
        );
    }
}
