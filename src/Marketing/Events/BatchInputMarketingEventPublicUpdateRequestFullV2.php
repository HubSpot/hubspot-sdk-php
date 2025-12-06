<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BatchInputMarketingEventPublicUpdateRequestFullV2Shape = array{
 *   inputs: list<MarketingEventPublicUpdateRequestFullV2>
 * }
 */
final class BatchInputMarketingEventPublicUpdateRequestFullV2 implements BaseModel
{
    /** @use SdkModel<BatchInputMarketingEventPublicUpdateRequestFullV2Shape> */
    use SdkModel;

    /** @var list<MarketingEventPublicUpdateRequestFullV2> $inputs */
    #[Api(list: MarketingEventPublicUpdateRequestFullV2::class)]
    public array $inputs;

    /**
     * `new BatchInputMarketingEventPublicUpdateRequestFullV2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputMarketingEventPublicUpdateRequestFullV2::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputMarketingEventPublicUpdateRequestFullV2)->withInputs(...)
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
     * @param list<MarketingEventPublicUpdateRequestFullV2|array{
     *   customProperties: list<PropertyValue>,
     *   objectId: string,
     *   endDateTime?: \DateTimeInterface|null,
     *   eventCancelled?: bool|null,
     *   eventDescription?: string|null,
     *   eventName?: string|null,
     *   eventOrganizer?: string|null,
     *   eventType?: string|null,
     *   eventUrl?: string|null,
     *   startDateTime?: \DateTimeInterface|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<MarketingEventPublicUpdateRequestFullV2|array{
     *   customProperties: list<PropertyValue>,
     *   objectId: string,
     *   endDateTime?: \DateTimeInterface|null,
     *   eventCancelled?: bool|null,
     *   eventDescription?: string|null,
     *   eventName?: string|null,
     *   eventOrganizer?: string|null,
     *   eventType?: string|null,
     *   eventUrl?: string|null,
     *   startDateTime?: \DateTimeInterface|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
