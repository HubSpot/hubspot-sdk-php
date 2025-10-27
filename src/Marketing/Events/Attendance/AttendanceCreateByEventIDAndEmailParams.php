<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Attendance;

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
 * @see HubspotSDK\Marketing\Events\Attendance->createByEventIDAndEmail
 *
 * @phpstan-type attendance_create_by_event_id_and_email_params = array{
 *   objectID: string, inputs: list<MarketingEventEmailSubscriber>
 * }
 */
final class AttendanceCreateByEventIDAndEmailParams implements BaseModel
{
    /** @use SdkModel<attendance_create_by_event_id_and_email_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectID;

    /**
     * List of marketing event details to create or update.
     *
     * @var list<MarketingEventEmailSubscriber> $inputs
     */
    #[Api(list: MarketingEventEmailSubscriber::class)]
    public array $inputs;

    /**
     * `new AttendanceCreateByEventIDAndEmailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCreateByEventIDAndEmailParams::with(objectID: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttendanceCreateByEventIDAndEmailParams)
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
     * @param list<MarketingEventEmailSubscriber> $inputs
     */
    public static function with(string $objectID, array $inputs): self
    {
        $obj = new self;

        $obj->objectID = $objectID;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

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
}
