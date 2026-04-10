<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventExternalUniqueIdentifier
 *
 * @phpstan-type BatchInputMarketingEventExternalUniqueIdentifierShape = array{
 *   inputs: list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape>,
 * }
 */
final class BatchInputMarketingEventExternalUniqueIdentifier implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventExternalUniqueIdentifierShape> */
    use SdkModel;

    /** @var list<MarketingEventExternalUniqueIdentifier> $inputs */
    #[Required(list: MarketingEventExternalUniqueIdentifier::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventExternalUniqueIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventExternalUniqueIdentifier::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventExternalUniqueIdentifier)->withInputs(...)
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
