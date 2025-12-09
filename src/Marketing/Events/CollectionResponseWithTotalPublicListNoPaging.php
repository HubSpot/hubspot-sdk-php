<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponseWithTotalPublicListNoPagingShape = array{
 *   results: list<PublicList>, total: int
 * }
 */
final class CollectionResponseWithTotalPublicListNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicListNoPagingShape> */
    use SdkModel;

    /** @var list<PublicList> $results */
    #[Required(list: PublicList::class)]
    public array $results;

    #[Required]
    public int $total;

    /**
     * `new CollectionResponseWithTotalPublicListNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicListNoPaging::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicListNoPaging)
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
     * @param list<PublicList|array{
     *   listID: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeID: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   size?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedByID?: string|null,
     * }> $results
     */
    public static function with(array $results, int $total): self
    {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<PublicList|array{
     *   listID: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeID: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   size?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedByID?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
