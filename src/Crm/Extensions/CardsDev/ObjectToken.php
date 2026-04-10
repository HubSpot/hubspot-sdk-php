<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\CardsDev\ObjectToken\DataType;

/**
 * @phpstan-type ObjectTokenShape = array{
 *   value: string,
 *   dataType?: null|DataType|value-of<DataType>,
 *   label?: string|null,
 *   name?: string|null,
 * }
 */
final class ObjectToken implements BaseModel
{
    /** @use SdkModel<ObjectTokenShape> */
    use SdkModel;

    /**
     * The value of the property.
     */
    #[Required]
    public string $value;

    /**
     * Type of data represented by this property.
     *
     * @var value-of<DataType>|null $dataType
     */
    #[Optional(enum: DataType::class)]
    public ?string $dataType;

    /**
     * The label for this property as you'd like it displayed to users.
     */
    #[Optional]
    public ?string $label;

    /**
     * An internal identifier for this property. This value must be unique TODO.
     */
    #[Optional]
    public ?string $name;

    /**
     * `new ObjectToken()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectToken::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectToken)->withValue(...)
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
     * @param DataType|value-of<DataType>|null $dataType
     */
    public static function with(
        string $value,
        DataType|string|null $dataType = null,
        ?string $label = null,
        ?string $name = null,
    ): self {
        $self = new self;

        $self['value'] = $value;

        null !== $dataType && $self['dataType'] = $dataType;
        null !== $label && $self['label'] = $label;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * The value of the property.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * Type of data represented by this property.
     *
     * @param DataType|value-of<DataType> $dataType
     */
    public function withDataType(DataType|string $dataType): self
    {
        $self = clone $this;
        $self['dataType'] = $dataType;

        return $self;
    }

    /**
     * The label for this property as you'd like it displayed to users.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * An internal identifier for this property. This value must be unique TODO.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
