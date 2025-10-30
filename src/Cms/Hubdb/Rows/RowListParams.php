<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns a set of rows in the published version of the specified table. Row results can be filtered and sorted. Filtering and sorting options will be sent as query parameters to the API request. For example, by adding the query parameters `column1__gt=5&sort=-column1`, API returns the rows with values for column `column1` greater than 5 and in the descending order of `column1` values. Refer to the [overview section](https://developers.hubspot.com/docs/api/cms/hubdb#filtering-and-sorting-table-rows) for detailed filtering and sorting options.
 * **Note:** This endpoint can be accessed without any authentication, if the table is set to be allowed for public access.
 *
 * @see HubspotSDK\Cms\Hubdb\Rows->list
 *
 * @phpstan-type RowListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   limit?: int,
 *   offset?: int,
 *   properties?: list<string>,
 *   sort?: list<string>,
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
    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * The maximum number of results to return. Default is `1000`.
     */
    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?int $offset;

    /**
     * Specify the column names to get results containing only the required columns instead of all column details.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /**
     * Specifies the column names to sort the results by. See the above description for more details.
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
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $limit && $obj->limit = $limit;
        null !== $offset && $obj->offset = $offset;
        null !== $properties && $obj->properties = $properties;
        null !== $sort && $obj->sort = $sort;

        return $obj;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * The maximum number of results to return. Default is `1000`.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    /**
     * Specify the column names to get results containing only the required columns instead of all column details.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * Specifies the column names to sort the results by. See the above description for more details.
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
