<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Response object for collections of marketing emails with pagination information.
 *
 * @phpstan-type collection_response_with_total_version_public_email = array{
 *   results: list<VersionPublicEmail>, total: int, paging?: Paging
 * }
 */
final class CollectionResponseWithTotalVersionPublicEmail implements BaseModel
{
    /** @use SdkModel<collection_response_with_total_version_public_email> */
    use SdkModel;

    /**
     * Collection of emails.
     *
     * @var list<VersionPublicEmail> $results
     */
    #[Api(list: VersionPublicEmail::class)]
    public array $results;

    /**
     * Total number of emails.
     */
    #[Api]
    public int $total;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalVersionPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalVersionPublicEmail::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalVersionPublicEmail)
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
     * @param list<VersionPublicEmail> $results
     */
    public static function with(
        array $results,
        int $total,
        ?Paging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * Collection of emails.
     *
     * @param list<VersionPublicEmail> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of emails.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
