<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyCreate;

/**
 * Create a batch of properties of the specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::createBatch()
 *
 * @phpstan-type PropertyCreateBatchParamsShape = array{
 *   appId: int, inputs: list<PropertyCreate>
 * }
 */
final class PropertyCreateBatchParams implements BaseModel
{
    /** @use SdkModel<PropertyCreateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /** @var list<PropertyCreate> $inputs */
    #[Api(list: PropertyCreate::class)]
    public array $inputs;

    /**
     * `new PropertyCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyCreateBatchParams::with(appId: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyCreateBatchParams)->withAppID(...)->withInputs(...)
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
     * @param list<PropertyCreate> $inputs
     */
    public static function with(int $appId, array $inputs): self
    {
        $obj = new self;

        $obj->appId = $appId;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }

    /**
     * @param list<PropertyCreate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
