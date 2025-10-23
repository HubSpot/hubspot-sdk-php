<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents\Attendance;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;

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
 * @see HubspotSDK\Marketing\MarketingEvents\Attendance->createByContactID
 *
 * @phpstan-type attendance_create_by_contact_id_params = array{
 *   externalEventID: string,
 *   inputs: list<MarketingEventSubscriber>,
 *   externalAccountID?: string,
 * }
 */
final class AttendanceCreateByContactIDParams implements BaseModel
{
    /** @use SdkModel<attendance_create_by_contact_id_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalEventID;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Api(list: MarketingEventSubscriber::class)]
    public array $inputs;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api(optional: true)]
    public ?string $externalAccountID;

    /**
     * `new AttendanceCreateByContactIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCreateByContactIDParams::with(externalEventID: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttendanceCreateByContactIDParams)
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
     * @param list<MarketingEventSubscriber> $inputs
     */
    public static function with(
        string $externalEventID,
        array $inputs,
        ?string $externalAccountID = null
    ): self {
        $obj = new self;

        $obj->externalEventID = $externalEventID;
        $obj->inputs = $inputs;

        null !== $externalAccountID && $obj->externalAccountID = $externalAccountID;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @param list<MarketingEventSubscriber> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

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
}
