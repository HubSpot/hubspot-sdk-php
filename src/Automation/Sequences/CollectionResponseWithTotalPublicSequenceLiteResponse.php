<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type PublicSequenceLiteResponseShape from \HubSpotSDK\Automation\Sequences\PublicSequenceLiteResponse
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseWithTotalPublicSequenceLiteResponseShape = array{
 *   results: list<PublicSequenceLiteResponse|PublicSequenceLiteResponseShape>,
 *   total: int,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseWithTotalPublicSequenceLiteResponse implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicSequenceLiteResponseShape> */
    use SdkModel;

    /**
     * An array of PublicSequenceLiteResponse objects, each representing a lightweight version of a sequence.
     *
     * @var list<PublicSequenceLiteResponse> $results
     */
    #[Required(list: PublicSequenceLiteResponse::class)]
    public array $results;

    /**
     * An integer representing the total number of sequence items available.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalPublicSequenceLiteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicSequenceLiteResponse::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicSequenceLiteResponse)
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
     * @param list<PublicSequenceLiteResponse|PublicSequenceLiteResponseShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        int $total,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * An array of PublicSequenceLiteResponse objects, each representing a lightweight version of a sequence.
     *
     * @param list<PublicSequenceLiteResponse|PublicSequenceLiteResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * An integer representing the total number of sequence items available.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

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
