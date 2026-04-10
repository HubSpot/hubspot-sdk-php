<?php

declare(strict_types=1);

namespace HubSpotSDK\Files;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type FolderShape from \HubSpotSDK\Files\Folder
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseFolderShape = array{
 *   results: list<Folder|FolderShape>, paging?: null|Paging|PagingShape
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
     * @param list<Folder|FolderShape> $results
     * @param Paging|PagingShape|null $paging
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
     * @param list<Folder|FolderShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

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
