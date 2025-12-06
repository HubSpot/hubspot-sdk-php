<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputMarketingEventEmailSubscriberShape = array{
 *   inputs: list<MarketingEventEmailSubscriber>
 * }
 */
final class BatchInputMarketingEventEmailSubscriber implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventEmailSubscriberShape> */
    use SdkModel;

    /**
     * List of marketing event details to create or update.
     *
     * @var list<MarketingEventEmailSubscriber> $inputs
     */
    #[Api(list: MarketingEventEmailSubscriber::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventEmailSubscriber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventEmailSubscriber::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventEmailSubscriber)->withInputs(...)
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
     * @param list<MarketingEventEmailSubscriber|array{
     *   contactProperties: array<string,string>,
     *   email: string,
     *   interactionDateTime: int,
     *   properties: array<string,string>,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * List of marketing event details to create or update.
     *
     * @param list<MarketingEventEmailSubscriber|array{
     *   contactProperties: array<string,string>,
     *   email: string,
     *   interactionDateTime: int,
     *   properties: array<string,string>,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
