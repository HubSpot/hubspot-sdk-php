<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type StreamingCollectionResponseWithTotalHubDBTableRowV3Shape = array{
 *   results: list<mixed>, total: int, type: value-of<Type>, paging?: Paging|null
 * }
 */
final class StreamingCollectionResponseWithTotalHubDBTableRowV3 implements BaseModel
{
    /** @use SdkModel<StreamingCollectionResponseWithTotalHubDBTableRowV3Shape> */
    use SdkModel;

    /** @var list<mixed> $results */
    #[Api(list: 'mixed')]
    public array $results;

    /**
     * The total number of rows available in the collection.
     */
    #[Api]
    public int $total;

    /**
     * Indicates the type of response, which is 'STREAMING' by default.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new StreamingCollectionResponseWithTotalHubDBTableRowV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StreamingCollectionResponseWithTotalHubDBTableRowV3::with(
     *   results: ..., total: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StreamingCollectionResponseWithTotalHubDBTableRowV3)
     *   ->withResults(...)
     *   ->withTotal(...)
     *   ->withType(...)
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
     * @param list<mixed> $results
     * @param Type|value-of<Type> $type
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        Type|string $type = 'STREAMING',
        Paging|array|null $paging = null,
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;
        $obj['type'] = $type;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<mixed> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * The total number of rows available in the collection.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * Indicates the type of response, which is 'STREAMING' by default.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
