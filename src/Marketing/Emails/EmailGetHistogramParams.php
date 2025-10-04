<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailGetHistogramParams\Interval;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmailGetHistogramParams); // set properties as needed
 * $client->marketing.emails->getHistogram(...$params->toArray());
 * ```
 * Get aggregated statistic intervals.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->getHistogram(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->getHistogram
 *
 * @phpstan-type email_get_histogram_params = array{
 *   emailIDs?: list<int>,
 *   endTimestamp?: string,
 *   interval?: Interval|value-of<Interval>,
 *   startTimestamp?: string,
 * }
 */
final class EmailGetHistogramParams implements BaseModel
{
    /** @use SdkModel<email_get_histogram_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<int>|null $emailIDs */
    #[Api(list: 'int', optional: true)]
    public ?array $emailIDs;

    #[Api(optional: true)]
    public ?string $endTimestamp;

    /** @var value-of<Interval>|null $interval */
    #[Api(enum: Interval::class, optional: true)]
    public ?string $interval;

    #[Api(optional: true)]
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
     * @param Interval|value-of<Interval> $interval
     */
    public static function with(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        Interval|string|null $interval = null,
        ?string $startTimestamp = null,
    ): self {
        $obj = new self;

        null !== $emailIDs && $obj->emailIDs = $emailIDs;
        null !== $endTimestamp && $obj->endTimestamp = $endTimestamp;
        null !== $interval && $obj['interval'] = $interval;
        null !== $startTimestamp && $obj->startTimestamp = $startTimestamp;

        return $obj;
    }

    /**
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $obj = clone $this;
        $obj->emailIDs = $emailIDs;

        return $obj;
    }

    public function withEndTimestamp(string $endTimestamp): self
    {
        $obj = clone $this;
        $obj->endTimestamp = $endTimestamp;

        return $obj;
    }

    /**
     * @param Interval|value-of<Interval> $interval
     */
    public function withInterval(Interval|string $interval): self
    {
        $obj = clone $this;
        $obj['interval'] = $interval;

        return $obj;
    }

    public function withStartTimestamp(string $startTimestamp): self
    {
        $obj = clone $this;
        $obj->startTimestamp = $startTimestamp;

        return $obj;
    }
}
