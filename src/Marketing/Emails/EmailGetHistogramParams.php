<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;

/**
 * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
 *
 * @see HubSpotSDK\Services\Marketing\EmailsService::getHistogram()
 *
 * @phpstan-type EmailGetHistogramParamsShape = array{
 *   emailIDs?: list<int>|null,
 *   endTimestamp?: \DateTimeInterface|null,
 *   interval?: null|\HubSpotSDK\Marketing\Emails\EmailGetHistogramParams\Interval|value-of<\HubSpotSDK\Marketing\Emails\EmailGetHistogramParams\Interval>,
 *   startTimestamp?: \DateTimeInterface|null,
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
    public ?\DateTimeInterface $endTimestamp;

    /**
     * @var value-of<Interval>|null $interval
     */
    #[Optional(
        enum: Interval::class
    )]
    public ?string $interval;

    #[Optional]
    public ?\DateTimeInterface $startTimestamp;

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
        ?\DateTimeInterface $endTimestamp = null,
        Interval|string|null $interval = null,
        ?\DateTimeInterface $startTimestamp = null,
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

    public function withEndTimestamp(\DateTimeInterface $endTimestamp): self
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

    public function withStartTimestamp(\DateTimeInterface $startTimestamp): self
    {
        $self = clone $this;
        $self['startTimestamp'] = $startTimestamp;

        return $self;
    }
}
