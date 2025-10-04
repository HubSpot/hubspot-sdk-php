<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type marketing_emails_collection_response_with_total_email_statistic_interval_no_paging = array{
 *   results: list<MarketingEmailsEmailStatisticInterval>, total: int
 * }
 */
final class MarketingEmailsCollectionResponseWithTotalEmailStatisticIntervalNoPaging implements BaseModel, ResponseConverter
{
    /**
     * @use SdkModel<marketing_emails_collection_response_with_total_email_statistic_interval_no_paging>
     */
    use SdkModel;

    use SdkResponse;

    /** @var list<MarketingEmailsEmailStatisticInterval> $results */
    #[Api(list: MarketingEmailsEmailStatisticInterval::class)]
    public array $results;

    #[Api]
    public int $total;

    /**
     * `new MarketingEmailsCollectionResponseWithTotalEmailStatisticIntervalNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEmailsCollectionResponseWithTotalEmailStatisticIntervalNoPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEmailsCollectionResponseWithTotalEmailStatisticIntervalNoPaging)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<MarketingEmailsEmailStatisticInterval> $results
     */
    public static function with(array $results, int $total): self
    {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        return $obj;
    }

    /**
     * @param list<MarketingEmailsEmailStatisticInterval> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
