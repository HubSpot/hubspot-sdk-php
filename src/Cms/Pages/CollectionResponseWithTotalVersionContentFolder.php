<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailsPaging;

/**
 * Response object for collections of content folder versions with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionContentFolderShape = array{
 *   results: list<VersionContentFolder>, total: int, paging?: EmailsPaging|null
 * }
 */
final class CollectionResponseWithTotalVersionContentFolder implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionContentFolderShape> */
    use SdkModel;

    /**
     * Collection of content folder versions.
     *
     * @var list<VersionContentFolder> $results
     */
    #[Api(list: VersionContentFolder::class)]
    public array $results;

    /**
     * Total number of content folder versions.
     */
    #[Api]
    public int $total;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?EmailsPaging $paging;

    /**
     * `new CollectionResponseWithTotalVersionContentFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalVersionContentFolder::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalVersionContentFolder)
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
     * @param list<VersionContentFolder> $results
     */
    public static function with(
        array $results,
        int $total,
        ?EmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * Collection of content folder versions.
     *
     * @param list<VersionContentFolder> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of content folder versions.
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
    public function withPaging(EmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
