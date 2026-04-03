<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Required;
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

    /**
     * The internal ID of the marketing event in HubSpot.
     */
    #[Required('objectId')]
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
        $self = new self;

        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The internal ID of the marketing event in HubSpot.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }
}
