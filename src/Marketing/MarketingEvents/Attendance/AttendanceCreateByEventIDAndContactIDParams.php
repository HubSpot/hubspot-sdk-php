<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents\Attendance;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;

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
 * @see HubSpotSDK\Services\Marketing\MarketingEvents\AttendanceService::createByEventIDAndContactID()
 *
 * @phpstan-import-type MarketingEventSubscriberShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventSubscriber
 *
 * @phpstan-type AttendanceCreateByEventIDAndContactIDParamsShape = array{
 *   objectID: string,
 *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
 * }
 */
final class AttendanceCreateByEventIDAndContactIDParams implements BaseModel
{
    /** @use SdkModel<AttendanceCreateByEventIDAndContactIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Required(list: MarketingEventSubscriber::class)]
    public array $inputs;

    /**
     * `new AttendanceCreateByEventIDAndContactIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCreateByEventIDAndContactIDParams::with(objectID: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttendanceCreateByEventIDAndContactIDParams)
     *   ->withObjectID(...)
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
    public static function with(string $objectID, array $inputs): self
    {
        $self = new self;

        $self['objectID'] = $objectID;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

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
