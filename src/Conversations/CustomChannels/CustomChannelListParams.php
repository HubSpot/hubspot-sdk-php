<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Optional;
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
    #[Optional]
    public ?string $after;

    /**
     * Specify the default number of results to return per page.
     */
    #[Optional]
    public ?int $defaultPageLength;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Specify the sorting order for the results.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
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
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $defaultPageLength && $self['defaultPageLength'] = $defaultPageLength;
        null !== $limit && $self['limit'] = $limit;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Specify the default number of results to return per page.
     */
    public function withDefaultPageLength(int $defaultPageLength): self
    {
        $self = clone $this;
        $self['defaultPageLength'] = $defaultPageLength;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Specify the sorting order for the results.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
