<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams\DataSensitivity;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyName;

/**
 * Get the details for a batch of properties for a specified object type.
 *
 * @see HubspotSDK\Cms\MediaBridge\Properties->getBatch
 *
 * @phpstan-type PropertyGetBatchParamsShape = array{
 *   appId: string,
 *   archived: bool,
 *   inputs: list<PropertyName>,
 *   dataSensitivity?: DataSensitivity|value-of<DataSensitivity>,
 * }
 */
final class PropertyGetBatchParams implements BaseModel
{
    /** @use SdkModel<PropertyGetBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appId;

    #[Api]
    public bool $archived;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    /**
     * `new PropertyGetBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGetBatchParams::with(appId: ..., archived: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGetBatchParams)->withAppID(...)->withArchived(...)->withInputs(...)
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
        string $appId,
        bool $archived,
        array $inputs,
        DataSensitivity|string|null $dataSensitivity = null,
    ): self {
        $obj = new self;

        $obj->appId = $appId;
        $obj->archived = $archived;
        $obj->inputs = $inputs;

        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

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
