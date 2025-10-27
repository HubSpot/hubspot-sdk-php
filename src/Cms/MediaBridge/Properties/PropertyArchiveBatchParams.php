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
 * @phpstan-type property_archive_batch_params = array{
 *   appID: string, inputs: list<PropertyName>
 * }
 */
final class PropertyArchiveBatchParams implements BaseModel
{
    /** @use SdkModel<property_archive_batch_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    /** @var list<PropertyName> $inputs */
    #[Api(list: PropertyName::class)]
    public array $inputs;

    /**
     * `new PropertyArchiveBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyArchiveBatchParams::with(appID: ..., inputs: ...)
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
     * @param list<PropertyName> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
