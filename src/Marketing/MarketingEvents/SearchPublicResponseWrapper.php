<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SearchPublicResponseWrapperShape = array{
 *   appID: int,
 *   externalAccountID: string,
 *   externalEventID: string,
 *   objectID: string,
 * }
 */
final class SearchPublicResponseWrapper implements BaseModel
{
    /** @use SdkModel<SearchPublicResponseWrapperShape> */
    use SdkModel;

    /**
     * The ID of the source application of the marketing event.
     */
    #[Required('appId')]
    public int $appID;

    /**
     * The account ID associated with this marketing event in the external application.
     */
    #[Required('externalAccountId')]
    public string $externalAccountID;

    /**
     * The ID of the marketing event in the external event application.
     */
    #[Required('externalEventId')]
    public string $externalEventID;

    /**
     * The internal ID of the marketing event in HubSpot.
     */
    #[Required('objectId')]
    public string $objectID;

    /**
     * `new SearchPublicResponseWrapper()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SearchPublicResponseWrapper::with(
     *   appID: ..., externalAccountID: ..., externalEventID: ..., objectID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SearchPublicResponseWrapper)
     *   ->withAppID(...)
     *   ->withExternalAccountID(...)
     *   ->withExternalEventID(...)
     *   ->withObjectID(...)
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
    public static function with(
        int $appID,
        string $externalAccountID,
        string $externalEventID,
        string $objectID,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['externalAccountID'] = $externalAccountID;
        $self['externalEventID'] = $externalEventID;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The ID of the source application of the marketing event.
     */
    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * The account ID associated with this marketing event in the external application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    /**
     * The ID of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

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
