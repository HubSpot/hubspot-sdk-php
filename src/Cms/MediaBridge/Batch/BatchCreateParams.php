<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\Batch;

use HubSpotSDK\Cms\MediaBridge\PropertyCreate;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a batch of properties of the specified object type.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridge\BatchService::create()
 *
 * @phpstan-import-type PropertyCreateShape from \HubSpotSDK\Cms\MediaBridge\PropertyCreate
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   appID: int, inputs: list<PropertyCreate|PropertyCreateShape>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /** @var list<PropertyCreate> $inputs */
    #[Required(list: PropertyCreate::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(appID: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withAppID(...)->withInputs(...)
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
     * @param list<PropertyCreate|PropertyCreateShape> $inputs
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
     * @param list<PropertyCreate|PropertyCreateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
