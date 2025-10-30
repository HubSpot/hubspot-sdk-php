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
 * @see HubspotSDK\Cms\MediaBridge\Properties->createBatch
 *
 * @phpstan-type PropertyCreateBatchParamsShape = array{
 *   appID: string, inputs: list<PropertyCreate>
 * }
 */
final class PropertyCreateBatchParams implements BaseModel
{
    /** @use SdkModel<PropertyCreateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    /** @var list<PropertyCreate> $inputs */
    #[Api(list: PropertyCreate::class)]
    public array $inputs;

    /**
     * `new PropertyCreateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyCreateBatchParams::with(appID: ..., inputs: ...)
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
    public static function with(string $appID, array $inputs): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

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
