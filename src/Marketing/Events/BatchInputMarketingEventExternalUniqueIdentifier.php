<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputMarketingEventExternalUniqueIdentifierShape = array{
 *   inputs: list<MarketingEventExternalUniqueIdentifier>
 * }
 */
final class BatchInputMarketingEventExternalUniqueIdentifier implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventExternalUniqueIdentifierShape> */
    use SdkModel;

    /** @var list<MarketingEventExternalUniqueIdentifier> $inputs */
    #[Api(list: MarketingEventExternalUniqueIdentifier::class)]
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
     * @param list<MarketingEventExternalUniqueIdentifier|array{
     *   appId: int, externalAccountId: string, externalEventId: string
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventExternalUniqueIdentifier|array{
     *   appId: int, externalAccountId: string, externalEventId: string
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
