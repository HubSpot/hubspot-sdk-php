<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\Attendance;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;

/**
 * @see HubspotSDK\Services\Marketing\Events\AttendanceService::createByEventIDAndEmail()
 *
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber
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
