<?php

declare(strict_types=1);

namespace ChrisHarrison\Entities\Examples;

use ChrisHarrison\Entities\EntityId;
use Funeralzone\ValueObjects\Scalars\StringTrait;

final class UserId implements EntityId
{
    use StringTrait;
}
