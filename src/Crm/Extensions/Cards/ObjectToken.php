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
 *   dataType?: value-of<DataType>|null,
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
     * @param DataType|value-of<DataType> $dataType
     */
    public static function with(
        string $value,
        DataType|string|null $dataType = null,
        ?string $label = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj['value'] = $value;

        null !== $dataType && $obj['dataType'] = $dataType;
        null !== $label && $obj['label'] = $label;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }

    /**
     * @param DataType|value-of<DataType> $dataType
     */
    public function withDataType(DataType|string $dataType): self
    {
        $obj = clone $this;
        $obj['dataType'] = $dataType;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
