<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\Batch;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\PropertyName;

/**
 * Archive a batch of existing properties for the specified types.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridge\BatchService::delete()
 *
 * @phpstan-import-type PropertyNameShape from \HubSpotSDK\PropertyName
 *
 * @phpstan-type BatchDeleteParamsShape = array{
 *   appID: int, inputs: list<PropertyName|PropertyNameShape>
 * }
 */
final class BatchDeleteParams implements BaseModel
{
    /** @use SdkModel<BatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /** @var list<PropertyName> $inputs */
    #[Required(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new BatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchDeleteParams::with(appID: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchDeleteParams)->withAppID(...)->withInputs(...)
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
     * @param list<PropertyName|PropertyNameShape> $inputs
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
     * @param list<PropertyName|PropertyNameShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
