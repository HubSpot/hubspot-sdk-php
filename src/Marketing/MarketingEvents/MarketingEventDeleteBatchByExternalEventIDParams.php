<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Deletes multiple Marketing Events based on externalAccountId, externalEventId, and appId.
 *
 * Only Marketing Events created by the same apps will be deleted; events from other apps cannot be removed by this endpoint.
 *
 * @see HubSpotSDK\Services\Marketing\MarketingEventsService::deleteBatchByExternalEventID()
 *
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventExternalUniqueIdentifier
 *
 * @phpstan-type MarketingEventDeleteBatchByExternalEventIDParamsShape = array{
 *   inputs: list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape>,
 * }
 */
final class MarketingEventDeleteBatchByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<MarketingEventDeleteBatchByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<MarketingEventExternalUniqueIdentifier> $inputs */
    #[Required(list: MarketingEventExternalUniqueIdentifier::class)]
    public array $inputs;

    /**
     * `new MarketingEventDeleteBatchByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventDeleteBatchByExternalEventIDParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventDeleteBatchByExternalEventIDParams)->withInputs(...)
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
     * @param list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
