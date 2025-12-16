<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyName;

/**
 * Archive a batch of existing properties for the specified types.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::deleteBatch()
 *
 * @phpstan-import-type PropertyNameShape from \HubspotSDK\PropertyName
 *
 * @phpstan-type PropertyDeleteBatchParamsShape = array{
 *   appID: int, inputs: list<PropertyNameShape>
 * }
 */
final class PropertyDeleteBatchParams implements BaseModel
{
    /** @use SdkModel<PropertyDeleteBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /** @var list<PropertyName> $inputs */
    #[Required(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new PropertyDeleteBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyDeleteBatchParams::with(appID: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyDeleteBatchParams)->withAppID(...)->withInputs(...)
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
     * @param list<PropertyNameShape> $inputs
     */
    public static function with(int $appID, array $inputs): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * @param list<PropertyNameShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
