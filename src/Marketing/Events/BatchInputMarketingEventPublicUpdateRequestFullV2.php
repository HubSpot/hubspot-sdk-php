<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
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
    #[Required(list: MarketingEventPublicUpdateRequestFullV2::class)]
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
     *   objectID: string,
     *   endDateTime?: \DateTimeInterface|null,
     *   eventCancelled?: bool|null,
     *   eventDescription?: string|null,
     *   eventName?: string|null,
     *   eventOrganizer?: string|null,
     *   eventType?: string|null,
     *   eventURL?: string|null,
     *   startDateTime?: \DateTimeInterface|null,
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<MarketingEventPublicUpdateRequestFullV2|array{
     *   customProperties: list<PropertyValue>,
     *   objectID: string,
     *   endDateTime?: \DateTimeInterface|null,
     *   eventCancelled?: bool|null,
     *   eventDescription?: string|null,
     *   eventName?: string|null,
     *   eventOrganizer?: string|null,
     *   eventType?: string|null,
     *   eventURL?: string|null,
     *   startDateTime?: \DateTimeInterface|null,
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
