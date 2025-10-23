<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents\Attendance;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;

/**
 * Records the participation of multiple HubSpot contacts in a Marketing Event using their email addresses.
 *
 * If a contact does not exist, it will be automatically created. The contactProperties field is used exclusively for creating new contacts and will not update properties of existing contacts.
 *
 * Additional Functionality:
 * - Adds a timeline event to the contacts.
 *
 * Allowed Properties:
 * For the state "attend":
 * - joinedAt
 * - leftAt
 *
 * @see HubspotSDK\Marketing\MarketingEvents\Attendance->createByEmail
 *
 * @phpstan-type attendance_create_by_email_params = array{
 *   externalEventID: string,
 *   inputs: list<MarketingEventEmailSubscriber>,
 *   externalAccountID?: string,
 * }
 */
final class AttendanceCreateByEmailParams implements BaseModel
{
    /** @use SdkModel<attendance_create_by_email_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalEventID;

    /**
     * List of marketing event details to create or update.
     *
     * @var list<MarketingEventEmailSubscriber> $inputs
     */
    #[Api(list: MarketingEventEmailSubscriber::class)]
    public array $inputs;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api(optional: true)]
    public ?string $externalAccountID;

    /**
     * `new AttendanceCreateByEmailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCreateByEmailParams::with(externalEventID: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttendanceCreateByEmailParams)->withExternalEventID(...)->withInputs(...)
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
     * @param list<MarketingEventEmailSubscriber> $inputs
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
     * List of marketing event details to create or update.
     *
     * @param list<MarketingEventEmailSubscriber> $inputs
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
