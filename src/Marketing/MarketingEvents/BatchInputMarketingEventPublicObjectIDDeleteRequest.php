<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MarketingEventPublicObjectIDDeleteRequestShape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicObjectIDDeleteRequest
 *
 * @phpstan-type BatchInputMarketingEventPublicObjectIDDeleteRequestShape = array{
 *   inputs: list<MarketingEventPublicObjectIDDeleteRequest|MarketingEventPublicObjectIDDeleteRequestShape>,
 * }
 */
final class BatchInputMarketingEventPublicObjectIDDeleteRequest implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventPublicObjectIDDeleteRequestShape> */
    use SdkModel;

    /** @var list<MarketingEventPublicObjectIDDeleteRequest> $inputs */
    #[Required(list: MarketingEventPublicObjectIDDeleteRequest::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventPublicObjectIDDeleteRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventPublicObjectIDDeleteRequest::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventPublicObjectIDDeleteRequest)->withInputs(...)
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
     * @param list<MarketingEventPublicObjectIDDeleteRequest|MarketingEventPublicObjectIDDeleteRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<MarketingEventPublicObjectIDDeleteRequest|MarketingEventPublicObjectIDDeleteRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
