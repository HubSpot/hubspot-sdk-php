<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Properties\BatchReadInputPropertyName\DataSensitivity;
use HubspotSDK\PropertyName;

/**
 * @phpstan-type BatchReadInputPropertyNameShape = array{
 *   archived: bool,
 *   inputs: list<PropertyName>,
 *   dataSensitivity?: value-of<DataSensitivity>,
 * }
 */
final class BatchReadInputPropertyName implements BaseModel
{
    /** @use SdkModel<BatchReadInputPropertyNameShape> */
    use SdkModel;

    #[Api]
    public bool $archived;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    /**
     * `new BatchReadInputPropertyName()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadInputPropertyName::with(archived: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadInputPropertyName)->withArchived(...)->withInputs(...)
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
     * @param list<PropertyName> $inputs
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public static function with(
        bool $archived,
        array $inputs,
        DataSensitivity|string|null $dataSensitivity = null,
    ): self {
        $obj = new self;

        $obj->archived = $archived;
        $obj->inputs = $inputs;

        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param list<PropertyName> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $obj = clone $this;
        $obj['dataSensitivity'] = $dataSensitivity;

        return $obj;
    }
}
