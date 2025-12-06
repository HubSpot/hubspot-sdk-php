<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all custom channels associated with the app.
 *
 * @see HubspotSDK\Services\Conversations\CustomChannelsService::list()
 *
 * @phpstan-type CustomChannelListParamsShape = array{
 *   after?: string, defaultPageLength?: int, limit?: int, sort?: list<string>
 * }
 */
final class CustomChannelListParams implements BaseModel
{
    /** @use SdkModel<CustomChannelListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Specify the default number of results to return per page.
     */
    #[Api(optional: true)]
    public ?int $defaultPageLength;

    /**
     * The maximum number of results to display per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Specify the sorting order for the results.
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

        null !== $after && $obj['after'] = $after;
        null !== $defaultPageLength && $obj['defaultPageLength'] = $defaultPageLength;
        null !== $limit && $obj['limit'] = $limit;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * Specify the default number of results to return per page.
     */
    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $obj = clone $this;
        $obj['defaultPageLength'] = $defaultPageLength;

        return $obj;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * Specify the sorting order for the results.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
