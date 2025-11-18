<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\BatchReadInputPropertyName\DataSensitivity;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchReadInputPropertyNameShape = array{
 *   archived: bool,
 *   dataSensitivity: value-of<DataSensitivity>,
 *   inputs: list<PropertyName>,
 * }
 */
final class BatchReadInputPropertyName implements BaseModel
{
    /** @use SdkModel<BatchReadInputPropertyNameShape> */
    use SdkModel;

    #[Api]
    public bool $archived;

    /** @var value-of<DataSensitivity> $dataSensitivity */
    #[Api(enum: DataSensitivity::class)]
    public string $dataSensitivity;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new BatchReadInputPropertyName()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadInputPropertyName::with(
     *   archived: ..., dataSensitivity: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadInputPropertyName)
     *   ->withArchived(...)
     *   ->withDataSensitivity(...)
     *   ->withInputs(...)
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
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param list<PropertyName> $inputs
     */
    public static function with(
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs
    ): self {
        $obj = new self;

        $obj->archived = $archived;
        $obj['dataSensitivity'] = $dataSensitivity;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

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

    /**
     * @param list<PropertyName> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
