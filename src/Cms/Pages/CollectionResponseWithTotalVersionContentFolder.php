<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;
use HubspotSDK\VersionUser;

/**
 * Response object for collections of content folder versions with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionContentFolderShape = array{
 *   results: list<VersionContentFolder>, total: int, paging?: Paging|null
 * }
 */
final class CollectionResponseWithTotalVersionContentFolder implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionContentFolderShape> */
    use SdkModel;

    /**
     * Collection of content folder versions.
     *
     * @var list<VersionContentFolder> $results
     */
    #[Required(list: VersionContentFolder::class)]
    public array $results;

    /**
     * Total number of content folder versions.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalVersionContentFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalVersionContentFolder::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalVersionContentFolder)
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
     * @param list<VersionContentFolder|array{
     *   id: string,
     *   object: ContentFolder,
     *   updatedAt: \DateTimeInterface,
     *   user: VersionUser,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
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
     * Collection of content folder versions.
     *
     * @param list<VersionContentFolder|array{
     *   id: string,
     *   object: ContentFolder,
     *   updatedAt: \DateTimeInterface,
     *   user: VersionUser,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Total number of content folder versions.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
