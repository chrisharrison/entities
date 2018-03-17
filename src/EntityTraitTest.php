<?php
// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjects;

use ChrisHarrison\Entities\Entity;
use ChrisHarrison\Entities\EntityId;
use ChrisHarrison\Entities\EntityTrait;
use Funeralzone\ValueObjects\Scalars\IntegerTrait;
use Funeralzone\ValueObjects\Scalars\StringTrait;
use PHPUnit\Framework\TestCase;

final class EntityTraitTest extends TestCase
{
    public function test_is_same_returns_true_if_values_are_the_same()
    {
        $test1 = new _EntityTrait(new _Id('1234'), new _TestValue(300));
        $test2 = new _EntityTrait(new _Id('1234'), new _TestValue(300));
        $this->assertTrue($test1->isSame($test2));
    }

    public function test_is_same_returns_false_if_values_differ()
    {
        $test1 = new _EntityTrait(new _Id('1234'), new _TestValue(200));
        $test2 = new _EntityTrait(new _Id('1234'), new _TestValue(300));
        $this->assertFalse($test1->isSame($test2));

        $test1 = new _EntityTrait(new _Id('1234'), new _TestValue(300));
        $test2 = new _EntityTrait(new _Id('5678'), new _TestValue(300));
        $this->assertFalse($test1->isSame($test2));
    }

    public function test_to_native_returns_private_properties_as_array()
    {
        $expectedArray = [
            'id' => '1234',
            'testValue' => 300,
        ];
        $test = new _EntityTrait(new _Id('1234'), new _TestValue(300));
        $this->assertEquals($expectedArray, $test->toNative());
    }
}

final class _EntityTrait implements Entity
{
    use EntityTrait;

    private $id;
    private $testValue;

    public function __construct(_Id $id, _TestValue $testValue)
    {
        $this->id = $id;
        $this->testValue = $testValue;
    }

    public function id(): EntityId
    {
        return $this->id;
    }

    public function getTestValue(): _TestValue
    {
        return $this->testValue;
    }

    public static function fromNative(array $native)
    {
        throw new \Exception('This is just a test.');
    }
}

final class _Id implements EntityId
{
    use StringTrait;
}

final class _TestValue implements ValueObject
{
    use IntegerTrait;
}
