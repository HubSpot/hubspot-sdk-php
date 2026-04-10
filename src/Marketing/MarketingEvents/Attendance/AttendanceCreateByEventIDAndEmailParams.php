<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents\Attendance;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;

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
 * @see HubSpotSDK\Services\Marketing\MarketingEvents\AttendanceService::createByEventIDAndEmail()
 *
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber
 *
 * @phpstan-type AttendanceCreateByEventIDAndEmailParamsShape = array{
 *   objectID: string,
 *   inputs: list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape>,
 * }
 */
final class AttendanceCreateByEventIDAndEmailParams implements BaseModel
{
    /** @use SdkModel<AttendanceCreateByEventIDAndEmailParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * List of marketing event details to create or update.
     *
     * @var list<MarketingEventEmailSubscriber> $inputs
     */
    #[Required(list: MarketingEventEmailSubscriber::class)]
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
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs
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
