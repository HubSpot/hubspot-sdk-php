<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Required('appId')]
    public int $appID;

    #[Required('externalAccountId')]
    public string $externalAccountID;

    #[Required('externalEventId')]
    public string $externalEventID;

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

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }
}
