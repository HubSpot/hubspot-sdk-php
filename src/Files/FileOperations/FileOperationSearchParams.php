<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Search through files in the file manager. Does not display hidden or archived files.
 *
 * @see HubspotSDK\Services\Files\FileOperationsService::search()
 *
 * @phpstan-type FileOperationSearchParamsShape = array{
 *   after?: string,
 *   allowsAnonymousAccess?: bool,
 *   before?: string,
 *   createdAt?: \DateTimeInterface,
 *   createdAtGte?: \DateTimeInterface,
 *   createdAtLte?: \DateTimeInterface,
 *   encoding?: string,
 *   expiresAt?: \DateTimeInterface,
 *   expiresAtGte?: \DateTimeInterface,
 *   expiresAtLte?: \DateTimeInterface,
 *   extension?: string,
 *   fileMd5?: string,
 *   height?: int,
 *   heightGte?: int,
 *   heightLte?: int,
 *   idGte?: int,
 *   idLte?: int,
 *   ids?: list<int>,
 *   isUsableInContent?: bool,
 *   limit?: int,
 *   name?: string,
 *   parentFolderIds?: list<int>,
 *   path?: string,
 *   properties?: list<string>,
 *   size?: int,
 *   sizeGte?: int,
 *   sizeLte?: int,
 *   sort?: list<string>,
 *   type?: string,
 *   updatedAt?: \DateTimeInterface,
 *   updatedAtGte?: \DateTimeInterface,
 *   updatedAtLte?: \DateTimeInterface,
 *   url?: string,
 *   width?: int,
 *   widthGte?: int,
 *   widthLte?: int,
 * }
 */
final class FileOperationSearchParams implements BaseModel
{
    /** @use SdkModel<FileOperationSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Search files by access. If `true`, will show only public files. If `false`, will show only private files.
     */
    #[Api(optional: true)]
    public ?bool $allowsAnonymousAccess;

    #[Api(optional: true)]
    public ?string $before;

    /**
     * Search files by time of creation.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Search files by greater than or equal to time of creation. Can be used with `createdAtLte` to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtGte;

    /**
     * Search files by less than or equal to time of creation. Can be used with `createdAtGte` to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtLte;

    /**
     * Search files by specified encoding.
     */
    #[Api(optional: true)]
    public ?string $encoding;

    /**
     * Search files by exact expires time. Time must be epoch time in milliseconds.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Search files by greater than or equal to expires time. Can be used with `expiresAtLte` to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAtGte;

    /**
     * Search files by less than or equal to expires time. Can be used with `expiresAtGte` to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAtLte;

    /**
     * Search files by given extension.
     */
    #[Api(optional: true)]
    public ?string $extension;

    /**
     * Search files by a specific md5 hash.
     */
    #[Api(optional: true)]
    public ?string $fileMd5;

    /**
     * Search files by height of image or video.
     */
    #[Api(optional: true)]
    public ?int $height;

    /**
     * Search files by greater than or equal to height of image or video. Can be used with `heightLte` to create a range.
     */
    #[Api(optional: true)]
    public ?int $heightGte;

    /**
     * Search files by less than or equal to height of image or video. Can be used with `heightGte` to create a range.
     */
    #[Api(optional: true)]
    public ?int $heightLte;

    #[Api(optional: true)]
    public ?int $idGte;

    #[Api(optional: true)]
    public ?int $idLte;

    /**
     * Search by a list of file IDs.
     *
     * @var list<int>|null $ids
     */
    #[Api(list: 'int', optional: true)]
    public ?array $ids;

    /**
     * If `true`, shows files that have been marked to be used in new content. If `false`, shows files that should not be used in new content.
     */
    #[Api(optional: true)]
    public ?bool $isUsableInContent;

    /**
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Search for files containing the given name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Search files within given `folderId`.
     *
     * @var list<int>|null $parentFolderIds
     */
    #[Api(list: 'int', optional: true)]
    public ?array $parentFolderIds;

    /**
     * Search files by path.
     */
    #[Api(optional: true)]
    public ?string $path;

    /**
     * A list of file properties to return.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /**
     * Search files by exact file size in bytes.
     */
    #[Api(optional: true)]
    public ?int $size;

    /**
     * Search files by greater than or equal to file size. Can be used with `sizeLte` to create a range.
     */
    #[Api(optional: true)]
    public ?int $sizeGte;

    /**
     * Search files by less than or equal to file size. Can be used with `sizeGte` to create a range.
     */
    #[Api(optional: true)]
    public ?int $sizeLte;

    /**
     * Sort files by a given field.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Filter by provided file type.
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Search files by time of latest updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Search files by greater than or equal to time of latest update. Can be used with `updatedAtLte` to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAtGte;

    /**
     * Search files by less than or equal to time of latest update. Can be used with `updatedAtGte` to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAtLte;

    /**
     * Search by file URL.
     */
    #[Api(optional: true)]
    public ?string $url;

    /**
     * Search files by width of image or video.
     */
    #[Api(optional: true)]
    public ?int $width;

    /**
     * Search files by greater than or equal to width of image or video. Can be used with `widthLte` to create a range.
     */
    #[Api(optional: true)]
    public ?int $widthGte;

    /**
     * Search files by less than or equal to width of image or video. Can be used with `widthGte` to create a range.
     */
    #[Api(optional: true)]
    public ?int $widthLte;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $ids
     * @param list<int> $parentFolderIds
     * @param list<string> $properties
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $allowsAnonymousAccess = null,
        ?string $before = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdAtGte = null,
        ?\DateTimeInterface $createdAtLte = null,
        ?string $encoding = null,
        ?\DateTimeInterface $expiresAt = null,
        ?\DateTimeInterface $expiresAtGte = null,
        ?\DateTimeInterface $expiresAtLte = null,
        ?string $extension = null,
        ?string $fileMd5 = null,
        ?int $height = null,
        ?int $heightGte = null,
        ?int $heightLte = null,
        ?int $idGte = null,
        ?int $idLte = null,
        ?array $ids = null,
        ?bool $isUsableInContent = null,
        ?int $limit = null,
        ?string $name = null,
        ?array $parentFolderIds = null,
        ?string $path = null,
        ?array $properties = null,
        ?int $size = null,
        ?int $sizeGte = null,
        ?int $sizeLte = null,
        ?array $sort = null,
        ?string $type = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedAtGte = null,
        ?\DateTimeInterface $updatedAtLte = null,
        ?string $url = null,
        ?int $width = null,
        ?int $widthGte = null,
        ?int $widthLte = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $allowsAnonymousAccess && $obj->allowsAnonymousAccess = $allowsAnonymousAccess;
        null !== $before && $obj->before = $before;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdAtGte && $obj->createdAtGte = $createdAtGte;
        null !== $createdAtLte && $obj->createdAtLte = $createdAtLte;
        null !== $encoding && $obj->encoding = $encoding;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $expiresAtGte && $obj->expiresAtGte = $expiresAtGte;
        null !== $expiresAtLte && $obj->expiresAtLte = $expiresAtLte;
        null !== $extension && $obj->extension = $extension;
        null !== $fileMd5 && $obj->fileMd5 = $fileMd5;
        null !== $height && $obj->height = $height;
        null !== $heightGte && $obj->heightGte = $heightGte;
        null !== $heightLte && $obj->heightLte = $heightLte;
        null !== $idGte && $obj->idGte = $idGte;
        null !== $idLte && $obj->idLte = $idLte;
        null !== $ids && $obj->ids = $ids;
        null !== $isUsableInContent && $obj->isUsableInContent = $isUsableInContent;
        null !== $limit && $obj->limit = $limit;
        null !== $name && $obj->name = $name;
        null !== $parentFolderIds && $obj->parentFolderIds = $parentFolderIds;
        null !== $path && $obj->path = $path;
        null !== $properties && $obj->properties = $properties;
        null !== $size && $obj->size = $size;
        null !== $sizeGte && $obj->sizeGte = $sizeGte;
        null !== $sizeLte && $obj->sizeLte = $sizeLte;
        null !== $sort && $obj->sort = $sort;
        null !== $type && $obj->type = $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedAtGte && $obj->updatedAtGte = $updatedAtGte;
        null !== $updatedAtLte && $obj->updatedAtLte = $updatedAtLte;
        null !== $url && $obj->url = $url;
        null !== $width && $obj->width = $width;
        null !== $widthGte && $obj->widthGte = $widthGte;
        null !== $widthLte && $obj->widthLte = $widthLte;

        return $obj;
    }

    /**
     * Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Search files by access. If `true`, will show only public files. If `false`, will show only private files.
     */
    public function withAllowsAnonymousAccess(bool $allowsAnonymousAccess): self
    {
        $obj = clone $this;
        $obj->allowsAnonymousAccess = $allowsAnonymousAccess;

        return $obj;
    }

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * Search files by time of creation.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Search files by greater than or equal to time of creation. Can be used with `createdAtLte` to create a range.
     */
    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $obj = clone $this;
        $obj->createdAtGte = $createdAtGte;

        return $obj;
    }

    /**
     * Search files by less than or equal to time of creation. Can be used with `createdAtGte` to create a range.
     */
    public function withCreatedAtLte(\DateTimeInterface $createdAtLte): self
    {
        $obj = clone $this;
        $obj->createdAtLte = $createdAtLte;

        return $obj;
    }

    /**
     * Search files by specified encoding.
     */
    public function withEncoding(string $encoding): self
    {
        $obj = clone $this;
        $obj->encoding = $encoding;

        return $obj;
    }

    /**
     * Search files by exact expires time. Time must be epoch time in milliseconds.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * Search files by greater than or equal to expires time. Can be used with `expiresAtLte` to create a range.
     */
    public function withExpiresAtGte(\DateTimeInterface $expiresAtGte): self
    {
        $obj = clone $this;
        $obj->expiresAtGte = $expiresAtGte;

        return $obj;
    }

    /**
     * Search files by less than or equal to expires time. Can be used with `expiresAtGte` to create a range.
     */
    public function withExpiresAtLte(\DateTimeInterface $expiresAtLte): self
    {
        $obj = clone $this;
        $obj->expiresAtLte = $expiresAtLte;

        return $obj;
    }

    /**
     * Search files by given extension.
     */
    public function withExtension(string $extension): self
    {
        $obj = clone $this;
        $obj->extension = $extension;

        return $obj;
    }

    /**
     * Search files by a specific md5 hash.
     */
    public function withFileMd5(string $fileMd5): self
    {
        $obj = clone $this;
        $obj->fileMd5 = $fileMd5;

        return $obj;
    }

    /**
     * Search files by height of image or video.
     */
    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    /**
     * Search files by greater than or equal to height of image or video. Can be used with `heightLte` to create a range.
     */
    public function withHeightGte(int $heightGte): self
    {
        $obj = clone $this;
        $obj->heightGte = $heightGte;

        return $obj;
    }

    /**
     * Search files by less than or equal to height of image or video. Can be used with `heightGte` to create a range.
     */
    public function withHeightLte(int $heightLte): self
    {
        $obj = clone $this;
        $obj->heightLte = $heightLte;

        return $obj;
    }

    public function withIDGte(int $idGte): self
    {
        $obj = clone $this;
        $obj->idGte = $idGte;

        return $obj;
    }

    public function withIDLte(int $idLte): self
    {
        $obj = clone $this;
        $obj->idLte = $idLte;

        return $obj;
    }

    /**
     * Search by a list of file IDs.
     *
     * @param list<int> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }

    /**
     * If `true`, shows files that have been marked to be used in new content. If `false`, shows files that should not be used in new content.
     */
    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $obj = clone $this;
        $obj->isUsableInContent = $isUsableInContent;

        return $obj;
    }

    /**
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Search for files containing the given name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Search files within given `folderId`.
     *
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $obj = clone $this;
        $obj->parentFolderIds = $parentFolderIDs;

        return $obj;
    }

    /**
     * Search files by path.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }

    /**
     * A list of file properties to return.
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
     * Search files by exact file size in bytes.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    /**
     * Search files by greater than or equal to file size. Can be used with `sizeLte` to create a range.
     */
    public function withSizeGte(int $sizeGte): self
    {
        $obj = clone $this;
        $obj->sizeGte = $sizeGte;

        return $obj;
    }

    /**
     * Search files by less than or equal to file size. Can be used with `sizeGte` to create a range.
     */
    public function withSizeLte(int $sizeLte): self
    {
        $obj = clone $this;
        $obj->sizeLte = $sizeLte;

        return $obj;
    }

    /**
     * Sort files by a given field.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }

    /**
     * Filter by provided file type.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Search files by time of latest updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Search files by greater than or equal to time of latest update. Can be used with `updatedAtLte` to create a range.
     */
    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $obj = clone $this;
        $obj->updatedAtGte = $updatedAtGte;

        return $obj;
    }

    /**
     * Search files by less than or equal to time of latest update. Can be used with `updatedAtGte` to create a range.
     */
    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $obj = clone $this;
        $obj->updatedAtLte = $updatedAtLte;

        return $obj;
    }

    /**
     * Search by file URL.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Search files by width of image or video.
     */
    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }

    /**
     * Search files by greater than or equal to width of image or video. Can be used with `widthLte` to create a range.
     */
    public function withWidthGte(int $widthGte): self
    {
        $obj = clone $this;
        $obj->widthGte = $widthGte;

        return $obj;
    }

    /**
     * Search files by less than or equal to width of image or video. Can be used with `widthGte` to create a range.
     */
    public function withWidthLte(int $widthLte): self
    {
        $obj = clone $this;
        $obj->widthLte = $widthLte;

        return $obj;
    }
}
