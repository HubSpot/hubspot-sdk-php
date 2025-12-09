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
 * @phpstan-type PropertyGetBatchParamsShape = array{
 *   appId: int,
 *   archived: bool,
 *   dataSensitivity: DataSensitivity|value-of<DataSensitivity>,
 *   inputs: list<PropertyName|array{name: string}>,
 * }
 */
final class PropertyGetBatchParams implements BaseModel
{
    /** @use SdkModel<PropertyGetBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

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
     *   appId: ..., archived: ..., dataSensitivity: ..., inputs: ...
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
     * @param list<PropertyName|array{name: string}> $inputs
     */
    public static function with(
        int $appId,
        bool $archived,
        DataSensitivity|string $dataSensitivity,
        array $inputs,
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['archived'] = $archived;
        $obj['dataSensitivity'] = $dataSensitivity;
        $obj['inputs'] = $inputs;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

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
     * @param list<PropertyName|array{name: string}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
