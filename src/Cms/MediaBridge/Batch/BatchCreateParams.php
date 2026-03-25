<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyCreate;

/**
 * Create a batch of properties of the specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\BatchService::create()
 *
 * @phpstan-import-type PropertyCreateShape from \HubspotSDK\PropertyCreate
 *
 * @phpstan-type BatchCreateParamsShape = array{
 *   appID: string, inputs: list<PropertyCreate|PropertyCreateShape>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<BatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

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
    public static function with(string $appID, array $inputs): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withAppID(string $appID): self
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
