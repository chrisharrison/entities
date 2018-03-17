<?php

declare(strict_types=1);

namespace ChrisHarrison\Entities\Examples;

use Funeralzone\ValueObjects\Scalars\StringTrait;
use Funeralzone\ValueObjects\ValueObject;

final class Name implements ValueObject
{
    use StringTrait;
}
