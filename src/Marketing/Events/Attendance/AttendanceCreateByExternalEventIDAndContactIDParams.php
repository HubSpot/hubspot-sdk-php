<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Attendance;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;

/**
 * Records the participation of multiple HubSpot contacts in a Marketing Event using their HubSpot contact IDs.
 *
 * Additional Functionality:
 * - Adds a timeline event to the contacts.
 *
 * Allowed Properties:
 * For the state "attend":
 * - joinedAt
 * - leftAt
 *
 * @see HubspotSDK\Services\Marketing\Events\AttendanceService::createByExternalEventIDAndContactID()
 *
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventSubscriber
 *
 * @phpstan-type AttendanceCreateByExternalEventIDAndContactIDParamsShape = array{
 *   externalEventID: string,
 *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
 *   externalAccountID?: string|null,
 * }
 */
final class AttendanceCreateByExternalEventIDAndContactIDParams implements BaseModel
{
    /** @use SdkModel<AttendanceCreateByExternalEventIDAndContactIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalEventID;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Required(list: MarketingEventSubscriber::class)]
    public array $inputs;

    #[Optional]
    public ?string $externalAccountID;

    /**
     * `new AttendanceCreateByExternalEventIDAndContactIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCreateByExternalEventIDAndContactIDParams::with(
     *   externalEventID: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttendanceCreateByExternalEventIDAndContactIDParams)
     *   ->withExternalEventID(...)
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
        array $inputs,
        ?string $externalAccountID = null
    ): self {
        $self = new self;

        $self['externalEventID'] = $externalEventID;
        $self['inputs'] = $inputs;

        null !== $externalAccountID && $self['externalAccountID'] = $externalAccountID;

        return $self;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

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

    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

        return $self;
    }
}
