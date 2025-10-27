<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_event_external_unique_identifier = array{
 *   appID: int, externalAccountID: string, externalEventID: string
 * }
 */
final class MarketingEventExternalUniqueIdentifier implements BaseModel
{
    /** @use SdkModel<marketing_event_external_unique_identifier> */
    use SdkModel;

    /**
     * The id of the application that created the marketing event in HubSpot.
     */
    #[Api('appId')]
    public int $appID;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api('externalAccountId')]
    public string $externalAccountID;

    /**
     * The id of the marketing event in the external event application.
     */
    #[Api('externalEventId')]
    public string $externalEventID;

    /**
     * `new MarketingEventExternalUniqueIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventExternalUniqueIdentifier::with(
     *   appID: ..., externalAccountID: ..., externalEventID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventExternalUniqueIdentifier)
     *   ->withAppID(...)
     *   ->withExternalAccountID(...)
     *   ->withExternalEventID(...)
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
        string $externalEventID
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->externalAccountID = $externalAccountID;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }

    /**
     * The id of the application that created the marketing event in HubSpot.
     */
    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

        return $obj;
    }

    /**
     * The id of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }
}
