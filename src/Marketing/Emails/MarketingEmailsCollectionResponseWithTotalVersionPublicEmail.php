<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type marketing_emails_collection_response_with_total_version_public_email = array{
 *   results: list<MarketingEmailsVersionPublicEmail>,
 *   total: int,
 *   paging?: MarketingEmailsPaging,
 * }
 */
final class MarketingEmailsCollectionResponseWithTotalVersionPublicEmail implements BaseModel, ResponseConverter
{
    /**
     * @use SdkModel<marketing_emails_collection_response_with_total_version_public_email>
     */
    use SdkModel;

    use SdkResponse;

    /** @var list<MarketingEmailsVersionPublicEmail> $results */
    #[Api(list: MarketingEmailsVersionPublicEmail::class)]
    public array $results;

    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new MarketingEmailsCollectionResponseWithTotalVersionPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEmailsCollectionResponseWithTotalVersionPublicEmail::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEmailsCollectionResponseWithTotalVersionPublicEmail)
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
     * @param list<MarketingEmailsVersionPublicEmail> $results
     */
    public static function with(
        array $results,
        int $total,
        ?MarketingEmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<MarketingEmailsVersionPublicEmail> $results
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

    public function withPaging(MarketingEmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
