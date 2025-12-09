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
 * @phpstan-type AttendanceCreateByExternalEventIDAndContactIDParamsShape = array{
 *   externalEventId: string,
 *   inputs: list<MarketingEventSubscriber|array{
 *     interactionDateTime: int, properties: array<string,string>, vid: int
 *   }>,
 *   externalAccountId?: string,
 * }
 */
final class AttendanceCreateByExternalEventIDAndContactIDParams implements BaseModel
{
    /** @use SdkModel<AttendanceCreateByExternalEventIDAndContactIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $externalEventId;

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @var list<MarketingEventSubscriber> $inputs
     */
    #[Required(list: MarketingEventSubscriber::class)]
    public array $inputs;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Optional]
    public ?string $externalAccountId;

    /**
     * `new AttendanceCreateByExternalEventIDAndContactIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttendanceCreateByExternalEventIDAndContactIDParams::with(
     *   externalEventId: ..., inputs: ...
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
     * @param list<MarketingEventSubscriber|array{
     *   interactionDateTime: int, properties: array<string,string>, vid: int
     * }> $inputs
     */
    public static function with(
        string $externalEventId,
        array $inputs,
        ?string $externalAccountId = null
    ): self {
        $obj = new self;

        $obj['externalEventId'] = $externalEventId;
        $obj['inputs'] = $inputs;

        null !== $externalAccountId && $obj['externalAccountId'] = $externalAccountId;

        return $obj;
    }

    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventId'] = $externalEventID;

        return $obj;
    }

    /**
     * List of HubSpot contacts to subscribe to the marketing event.
     *
     * @param list<MarketingEventSubscriber|array{
     *   interactionDateTime: int, properties: array<string,string>, vid: int
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

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
}
