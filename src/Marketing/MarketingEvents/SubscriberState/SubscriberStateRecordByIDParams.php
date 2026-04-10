<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents\SubscriberState;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;

/**
 * Record a subscriber state between multiple HubSpot contacts and a marketing event, using HubSpot contact IDs. Note that the contact must already exist in HubSpot; a contact will not be created.
 *
 * @see HubSpotSDK\Services\Marketing\MarketingEvents\SubscriberStateService::recordByID()
 *
 * @phpstan-import-type MarketingEventSubscriberShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventSubscriber
 *
 * @phpstan-type SubscriberStateRecordByIDParamsShape = array{
 *   externalEventID: string,
 *   externalAccountID: string,
 *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
 * }
 */
final class SubscriberStateRecordByIDParams implements BaseModel
{
    /** @use SdkModel<SubscriberStateRecordByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalEventID;

    #[Required]
    public string $externalAccountID;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Required(list: MarketingEventSubscriber::class)]
    public array $inputs;

    /**
     * `new SubscriberStateRecordByIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriberStateRecordByIDParams::with(
     *   externalEventID: ..., externalAccountID: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriberStateRecordByIDParams)
     *   ->withExternalEventID(...)
     *   ->withExternalAccountID(...)
     *   ->withInputs(...)
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
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs
     */
    public static function with(
        string $externalEventID,
        string $externalAccountID,
        array $inputs
    ): self {
        $self = new self;

        $self['externalEventID'] = $externalEventID;
        $self['externalAccountID'] = $externalAccountID;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
