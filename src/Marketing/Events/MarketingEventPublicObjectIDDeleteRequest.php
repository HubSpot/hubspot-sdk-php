<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventPublicObjectIDDeleteRequestShape = array{
 *   objectID: string
 * }
 */
final class MarketingEventPublicObjectIDDeleteRequest implements BaseModel
{
    /** @use SdkModel<MarketingEventPublicObjectIDDeleteRequestShape> */
    use SdkModel;

    #[Api('objectId')]
    public string $objectID;

    /**
     * `new MarketingEventPublicObjectIDDeleteRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventPublicObjectIDDeleteRequest::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventPublicObjectIDDeleteRequest)->withObjectID(...)
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
     */
    public static function with(string $objectID): self
    {
        $obj = new self;

        $obj->objectID = $objectID;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }
}
