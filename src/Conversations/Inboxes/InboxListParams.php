<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Inboxes;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of conversations inboxes, with optional filters and sorting.
 *
 * @see HubspotSDK\Services\Conversations\InboxesService::list()
 *
 * @phpstan-type InboxListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   defaultPageLength?: int,
 *   limit?: int,
 *   sort?: list<string>,
 * }
 */
final class InboxListParams implements BaseModel
{
    /** @use SdkModel<InboxListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Whether to include archived inboxes in the response.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The default number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $defaultPageLength;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Specify the sort order for the inboxes.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?int $defaultPageLength = null,
        ?int $limit = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $defaultPageLength && $obj->defaultPageLength = $defaultPageLength;
        null !== $limit && $obj->limit = $limit;
        null !== $sort && $obj->sort = $sort;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Whether to include archived inboxes in the response.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * The default number of results to display per page.
     */
    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $obj = clone $this;
        $obj->defaultPageLength = $defaultPageLength;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Specify the sort order for the inboxes.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }
}
