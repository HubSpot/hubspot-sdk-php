<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\DoubleFieldSchema\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type DoubleFieldSchemaShape = array{
 *   type: Type|value-of<Type>, maximum?: float|null, minimum?: float|null
 * }
 */
final class DoubleFieldSchema implements BaseModel
{
    /** @use SdkModel<DoubleFieldSchemaShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?float $maximum;

    #[Optional]
    public ?float $minimum;

    /**
     * `new DoubleFieldSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DoubleFieldSchema::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DoubleFieldSchema)->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Type|string $type = 'DOUBLE',
        ?float $maximum = null,
        ?float $minimum = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $maximum && $self['maximum'] = $maximum;
        null !== $minimum && $self['minimum'] = $minimum;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withMaximum(float $maximum): self
    {
        $self = clone $this;
        $self['maximum'] = $maximum;

        return $self;
    }

    public function withMinimum(float $minimum): self
    {
        $self = clone $this;
        $self['minimum'] = $minimum;

        return $self;
    }
}
