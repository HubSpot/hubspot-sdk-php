<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Cms\Hubdb\StreamingCollectionResponseWithTotalHubDBTableRowV3\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type StreamingCollectionResponseWithTotalHubDBTableRowV3Shape = array{
 *   results: list<mixed>,
 *   total: int,
 *   type: Type|value-of<Type>,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class StreamingCollectionResponseWithTotalHubDBTableRowV3 implements BaseModel
{
    /** @use SdkModel<StreamingCollectionResponseWithTotalHubDBTableRowV3Shape> */
    use SdkModel;

    /** @var list<mixed> $results */
    #[Required(list: 'mixed')]
    public array $results;

    /**
     * The total number of rows available in the collection.
     */
    #[Required]
    public int $total;

    /**
     * Indicates the type of response, which is 'STREAMING' by default.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
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
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        int $total,
        Type|string $type = 'STREAMING',
        Paging|array|null $paging = null,
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;
        $self['type'] = $type;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<mixed> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The total number of rows available in the collection.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * Indicates the type of response, which is 'STREAMING' by default.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param Paging|PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
