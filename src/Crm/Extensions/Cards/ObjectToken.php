<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\ObjectToken\DataType;

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

    #[Required]
    public string $value;

    /** @var value-of<DataType>|null $dataType */
    #[Optional(enum: DataType::class)]
    public ?string $dataType;

    #[Optional]
    public ?string $label;

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

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * @param DataType|value-of<DataType> $dataType
     */
    public function withDataType(DataType|string $dataType): self
    {
        $self = clone $this;
        $self['dataType'] = $dataType;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
