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
 *   emailIDs?: list<int>,
 *   endTimestamp?: string,
 *   property?: string,
 *   startTimestamp?: string,
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
        $obj = new self;

        null !== $emailIDs && $obj['emailIDs'] = $emailIDs;
        null !== $endTimestamp && $obj['endTimestamp'] = $endTimestamp;
        null !== $property && $obj['property'] = $property;
        null !== $startTimestamp && $obj['startTimestamp'] = $startTimestamp;

        return $obj;
    }

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $obj = clone $this;
        $obj['emailIDs'] = $emailIDs;

        return $obj;
    }

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    public function withEndTimestamp(string $endTimestamp): self
    {
        $obj = clone $this;
        $obj['endTimestamp'] = $endTimestamp;

        return $obj;
    }

    /**
     * Specifies which email properties should be returned. All properties will be returned by default.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    public function withStartTimestamp(string $startTimestamp): self
    {
        $obj = clone $this;
        $obj['startTimestamp'] = $startTimestamp;

        return $obj;
    }
}
