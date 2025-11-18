<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Messages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the message history for a specific thread.
 *
 * @see HubspotSDK\Services\Conversations\MessagesService::list()
 *
 * @phpstan-type MessageListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   limit?: int,
 *   property?: string,
 *   sort?: list<string>,
 * }
 */
final class MessageListParams implements BaseModel
{
    /** @use SdkModel<MessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * A specific property to include in the message response.
     */
    #[Api(optional: true)]
    public ?string $property;

    /**
     * Sort direction. Valid options are `createdAt` (ascending), and `-createdAt` (descending, default).
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
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $limit && $obj->limit = $limit;
        null !== $property && $obj->property = $property;
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
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

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
     * A specific property to include in the message response.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }

    /**
     * Sort direction. Valid options are `createdAt` (ascending), and `-createdAt` (descending, default).
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
