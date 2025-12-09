<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\BatchReadInputPropertyName\DataSensitivity;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public bool $archived;

    /** @var value-of<DataSensitivity> $dataSensitivity */
    #[Required(enum: DataSensitivity::class)]
    public string $dataSensitivity;

    /** @var list<PropertyName> $inputs */
    #[Required(list: PropertyName::class)]
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
     * @param list<PropertyName|array{name: string}> $inputs
     */
    public static function with(
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs
    ): self {
        $self = new self;

        $self['archived'] = $archived;
        $self['dataSensitivity'] = $dataSensitivity;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $self = clone $this;
        $self['dataSensitivity'] = $dataSensitivity;

        return $self;
    }

    /**
     * @param list<PropertyName|array{name: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
