<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputMarketingEventPublicObjectIDDeleteRequestShape = array{
 *   inputs: list<MarketingEventPublicObjectIDDeleteRequest>
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
     * @param list<MarketingEventPublicObjectIDDeleteRequest|array{
     *   objectID: string
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventPublicObjectIDDeleteRequest|array{
     *   objectID: string
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
