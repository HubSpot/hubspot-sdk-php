<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type CollectionResponseFolderShape = array{
 *   results: list<Folder>, paging?: Paging|null
 * }
 */
final class CollectionResponseFolder implements BaseModel
{
    /** @use SdkModel<CollectionResponseFolderShape> */
    use SdkModel;

    /** @var list<Folder> $results */
    #[Required(list: Folder::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseFolder::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseFolder)->withResults(...)
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
     * @param list<Folder|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<Folder|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

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
