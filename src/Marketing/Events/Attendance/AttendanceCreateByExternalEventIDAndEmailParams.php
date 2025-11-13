<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Attendance;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;

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
 * @see HubspotSDK\Services\Marketing\Events\AttendanceService::createByExternalEventIDAndEmail()
 *
 * @phpstan-type AttendanceCreateByExternalEventIDAndEmailParamsShape = array{
 *   externalEventId: string,
 *   inputs: list<MarketingEventEmailSubscriber>,
 *   externalAccountId?: string,
 * }
 */
final class AttendanceCreateByExternalEventIDAndEmailParams implements BaseModel
{
    /** @use SdkModel<AttendanceCreateByExternalEventIDAndEmailParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $externalEventId;

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
    public ?string $externalAccountId;

    /**
     * `new AttendanceCreateByExternalEventIDAndEmailParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCreateByExternalEventIDAndEmailParams::with(
     *   externalEventId: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttendanceCreateByExternalEventIDAndEmailParams)
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
     * @param list<MarketingEventEmailSubscriber> $inputs
     */
    public static function with(
        string $externalEventId,
        array $inputs,
        ?string $externalAccountId = null
    ): self {
        $obj = new self;

        $obj->externalEventId = $externalEventId;
        $obj->inputs = $inputs;

        null !== $externalAccountId && $obj->externalAccountId = $externalAccountId;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventId = $externalEventID;

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
        $obj->externalAccountId = $externalAccountID;

        return $obj;
    }
}
