<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\Statistics;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
 *
 * @see HubspotSDK\Services\Marketing\Emails\StatisticsService::get()
 *
 * @phpstan-type StatisticGetParamsShape = array{
 *   emailIDs?: list<int>|null,
 *   endTimestamp?: string|null,
 *   property?: string|null,
 *   startTimestamp?: string|null,
 * }
 */
final class StatisticGetParams implements BaseModel
{
    /** @use SdkModel<StatisticGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @var list<int>|null $emailIDs
     */
    #[Optional(list: 'int')]
    public ?array $emailIDs;

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    #[Optional]
    public ?string $endTimestamp;

    /**
     * Specifies which email properties should be returned. All properties will be returned by default.
     */
    #[Optional]
    public ?string $property;

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
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
     * @param list<int> $emailIDs
     */
    public static function with(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        ?string $property = null,
        ?string $startTimestamp = null,
    ): self {
        $self = new self;

        null !== $emailIDs && $self['emailIDs'] = $emailIDs;
        null !== $endTimestamp && $self['endTimestamp'] = $endTimestamp;
        null !== $property && $self['property'] = $property;
        null !== $startTimestamp && $self['startTimestamp'] = $startTimestamp;

        return $self;
    }

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $self = clone $this;
        $self['emailIDs'] = $emailIDs;

        return $self;
    }

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    public function withEndTimestamp(string $endTimestamp): self
    {
        $self = clone $this;
        $self['endTimestamp'] = $endTimestamp;

        return $self;
    }

    /**
     * Specifies which email properties should be returned. All properties will be returned by default.
     */
    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    public function withStartTimestamp(string $startTimestamp): self
    {
        $self = clone $this;
        $self['startTimestamp'] = $startTimestamp;

        return $self;
    }
}
