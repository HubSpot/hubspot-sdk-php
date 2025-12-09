<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MarketingEventExternalUniqueIdentifierShape = array{
 *   appId: int, externalAccountId: string, externalEventId: string
 * }
 */
final class MarketingEventExternalUniqueIdentifier implements BaseModel
{
    /** @use SdkModel<MarketingEventExternalUniqueIdentifierShape> */
    use SdkModel;

    /**
     * The id of the application that created the marketing event in HubSpot.
     */
    #[Required]
    public int $appId;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Required]
    public string $externalAccountId;

    /**
     * The id of the marketing event in the external event application.
     */
    #[Required]
    public string $externalEventId;

    /**
     * `new MarketingEventExternalUniqueIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventExternalUniqueIdentifier::with(
     *   appId: ..., externalAccountId: ..., externalEventId: ...
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
        int $appId,
        string $externalAccountId,
        string $externalEventId
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['externalAccountId'] = $externalAccountId;
        $obj['externalEventId'] = $externalEventId;

        return $obj;
    }

    /**
     * The id of the application that created the marketing event in HubSpot.
     */
    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountId'] = $externalAccountID;

        return $obj;
    }

    /**
     * The id of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventId'] = $externalEventID;

        return $obj;
    }
}
