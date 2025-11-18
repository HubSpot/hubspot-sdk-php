<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\Channels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of channels, with optional filters and sorting.
 *
 * @see HubspotSDK\Services\Conversations\ChannelsService::list()
 *
 * @phpstan-type ChannelListParamsShape = array{
 *   after?: string, defaultPageLength?: int, limit?: int, sort?: list<string>
 * }
 */
final class ChannelListParams implements BaseModel
{
    /** @use SdkModel<ChannelListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

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
     * Specify the sort order for the channels.
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
        ?int $defaultPageLength = null,
        ?int $limit = null,
        ?array $sort = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
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
     * Specify the sort order for the channels.
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
