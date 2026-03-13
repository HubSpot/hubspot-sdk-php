<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyName;

/**
 * Get the details for a batch of properties for a specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::getBatch()
 *
 * @phpstan-import-type PropertyNameShape from \HubspotSDK\PropertyName
 *
 * @phpstan-type PropertyGetBatchParamsShape = array{
 *   appID: int,
 *   archived: bool,
 *   dataSensitivity: DataSensitivity|value-of<DataSensitivity>,
 *   inputs: list<PropertyName|PropertyNameShape>,
 * }
 */
final class PropertyGetBatchParams implements BaseModel
{
    /** @use SdkModel<PropertyGetBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public bool $archived;

    /** @var value-of<DataSensitivity> $dataSensitivity */
    #[Required(enum: DataSensitivity::class)]
    public string $dataSensitivity;

    /** @var list<PropertyName> $inputs */
    #[Required(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new PropertyGetBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGetBatchParams::with(
     *   appID: ..., archived: ..., dataSensitivity: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGetBatchParams)
     *   ->withAppID(...)
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
     * @param list<PropertyName|PropertyNameShape> $inputs
     */
    public static function with(
        int $appID,
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['archived'] = $archived;
        $self['dataSensitivity'] = $dataSensitivity;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

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
     * @param list<PropertyName|PropertyNameShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
