<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns a set of rows in the published version of the specified table. Row results can be filtered and sorted. Filtering and sorting options will be sent as query parameters to the API request. For example, by adding the query parameters `column1__gt=5&sort=-column1`, API returns the rows with values for column `column1` greater than 5 and in the descending order of `column1` values. Refer to the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#filtering-and-sorting-table-rows) for detailed filtering and sorting options.
 * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::list()
 *
 * @phpstan-type RowListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   properties?: list<string>|null,
 *   sort?: list<string>|null,
 * }
 */
final class RowListParams implements BaseModel
{
    /** @use SdkModel<RowListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Specifies whether to include archived rows in the response.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * The maximum number of results to return. Default is `1000`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The number of rows to skip before starting to return results.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Specify the column names to get results containing only the required columns instead of all column details.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * Specifies the column names to sort the results by. See the above description for more details.
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
     * @param list<string> $properties
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?int $limit = null,
        ?int $offset = null,
        ?array $properties = null,
        ?array $sort = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $properties && $self['properties'] = $properties;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Specifies whether to include archived rows in the response.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * The maximum number of results to return. Default is `1000`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The number of rows to skip before starting to return results.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Specify the column names to get results containing only the required columns instead of all column details.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Specifies the column names to sort the results by. See the above description for more details.
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
