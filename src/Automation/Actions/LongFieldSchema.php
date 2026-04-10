<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions;

use HubSpotSDK\Automation\Actions\LongFieldSchema\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LongFieldSchemaShape = array{
 *   type: Type|value-of<Type>, maximum?: int|null, minimum?: int|null
 * }
 */
final class LongFieldSchema implements BaseModel
{
    /** @use SdkModel<LongFieldSchemaShape> */
    use SdkModel;

    /**
     * The type of the field, which is LONG by default.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The maximum value allowed for the long field.
     */
    #[Optional]
    public ?int $maximum;

    /**
     * The minimum value allowed for the long field.
     */
    #[Optional]
    public ?int $minimum;

    /**
     * `new LongFieldSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LongFieldSchema::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LongFieldSchema)->withType(...)
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
        Type|string $type = 'LONG',
        ?int $maximum = null,
        ?int $minimum = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $maximum && $self['maximum'] = $maximum;
        null !== $minimum && $self['minimum'] = $minimum;

        return $self;
    }

    /**
     * The type of the field, which is LONG by default.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The maximum value allowed for the long field.
     */
    public function withMaximum(int $maximum): self
    {
        $self = clone $this;
        $self['maximum'] = $maximum;

        return $self;
    }

    /**
     * The minimum value allowed for the long field.
     */
    public function withMinimum(int $minimum): self
    {
        $self = clone $this;
        $self['minimum'] = $minimum;

        return $self;
    }
}
