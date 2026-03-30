<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\SubscriberState;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;

/**
 * Record a subscriber state between multiple HubSpot contacts and a marketing event, using contact email addresses. Note that the contact must already exist in HubSpot; a contact will not be created. The contactProperties field is used only when creating a new contact. These properties will not update existing contacts.
 *
 * @see HubspotSDK\Services\Marketing\Events\SubscriberStateService::recordByEmail()
 *
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber
 *
 * @phpstan-type SubscriberStateRecordByEmailParamsShape = array{
 *   externalEventID: string,
 *   externalAccountID: string,
 *   inputs: list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape>,
 * }
 */
final class SubscriberStateRecordByEmailParams implements BaseModel
{
    /** @use SdkModel<SubscriberStateRecordByEmailParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalEventID;

    #[Required]
    public string $externalAccountID;

    /**
     * List of marketing event details to create or update.
     *
     * @var list<MarketingEventEmailSubscriber> $inputs
     */
    #[Required(list: MarketingEventEmailSubscriber::class)]
    public array $inputs;

    /**
     * `new SubscriberStateRecordByEmailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriberStateRecordByEmailParams::with(
     *   externalEventID: ..., externalAccountID: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriberStateRecordByEmailParams)
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
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs
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
     * List of marketing event details to create or update.
     *
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
