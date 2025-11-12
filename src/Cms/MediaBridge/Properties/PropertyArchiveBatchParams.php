<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyName;

/**
 * Archive a batch of existing properties for the specified types.
 *
 * @see HubspotSDK\Cms\MediaBridge\Properties->archiveBatch
 *
 * @phpstan-type PropertyArchiveBatchParamsShape = array{
 *   appId: string, inputs: list<PropertyName>
 * }
 */
final class PropertyArchiveBatchParams implements BaseModel
{
    /** @use SdkModel<PropertyArchiveBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appId;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new PropertyArchiveBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyArchiveBatchParams::with(appId: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyArchiveBatchParams)->withAppID(...)->withInputs(...)
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
     */
    public static function with(string $appId, array $inputs): self
    {
        $obj = new self;

        $obj->appId = $appId;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

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
}
