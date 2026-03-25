<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;

/**
 * @see HubspotSDK\Services\Marketing\EmailsService::getHistogram()
 *
 * @phpstan-type EmailGetHistogramParamsShape = array{
 *   emailIDs?: list<int>|null,
 *   endTimestamp?: string|null,
 *   interval?: null|\HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval|value-of<\HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval>,
 *   startTimestamp?: string|null,
 * }
 */
final class EmailGetHistogramParams implements BaseModel
{
    /** @use SdkModel<EmailGetHistogramParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<int>|null $emailIDs */
    #[Optional(list: 'int')]
    public ?array $emailIDs;

    #[Optional]
    public ?string $endTimestamp;

    /**
     * @var value-of<Interval>|null $interval
     */
    #[Optional(
        enum: Interval::class
    )]
    public ?string $interval;

    #[Optional]
    public ?string $startTimestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $emailIDs
     * @param Interval|value-of<Interval>|null $interval
     */
    public static function with(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        Interval|string|null $interval = null,
        ?string $startTimestamp = null,
    ): self {
        $self = new self;

        null !== $emailIDs && $self['emailIDs'] = $emailIDs;
        null !== $endTimestamp && $self['endTimestamp'] = $endTimestamp;
        null !== $interval && $self['interval'] = $interval;
        null !== $startTimestamp && $self['startTimestamp'] = $startTimestamp;

        return $self;
    }

    /**
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $self = clone $this;
        $self['emailIDs'] = $emailIDs;

        return $self;
    }

    public function withEndTimestamp(string $endTimestamp): self
    {
        $self = clone $this;
        $self['endTimestamp'] = $endTimestamp;

        return $self;
    }

    /**
     * @param Interval|value-of<Interval> $interval
     */
    public function withInterval(
        Interval|string $interval,
    ): self {
        $self = clone $this;
        $self['interval'] = $interval;

        return $self;
    }

    public function withStartTimestamp(string $startTimestamp): self
    {
        $self = clone $this;
        $self['startTimestamp'] = $startTimestamp;

        return $self;
    }
}
