<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\File\Access;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * Collections of files.
 *
 * @phpstan-type CollectionResponseFileShape = array{
 *   results: list<File>, paging?: Paging|null
 * }
 */
final class CollectionResponseFile implements BaseModel
{
    /** @use SdkModel<CollectionResponseFileShape> */
    use SdkModel;

    /** @var list<File> $results */
    #[Required(list: File::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseFile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseFile::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseFile)->withResults(...)
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
     * @param list<File|array{
     *   id: string,
     *   access: value-of<Access>,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   defaultHostingURL?: string|null,
     *   encoding?: string|null,
     *   expiresAt?: int|null,
     *   extension?: string|null,
     *   fileMd5?: string|null,
     *   height?: int|null,
     *   isUsableInContent?: bool|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     *   size?: int|null,
     *   sourceGroup?: string|null,
     *   type?: string|null,
     *   url?: string|null,
     *   width?: int|null,
     * }> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<File|array{
     *   id: string,
     *   access: value-of<Access>,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   defaultHostingURL?: string|null,
     *   encoding?: string|null,
     *   expiresAt?: int|null,
     *   extension?: string|null,
     *   fileMd5?: string|null,
     *   height?: int|null,
     *   isUsableInContent?: bool|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     *   size?: int|null,
     *   sourceGroup?: string|null,
     *   type?: string|null,
     *   url?: string|null,
     *   width?: int|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

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
