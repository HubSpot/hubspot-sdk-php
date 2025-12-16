<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Search through files in the file manager. Does not display hidden or archived files.
 *
 * @see HubspotSDK\Services\Files\FileOperationsService::search()
 *
 * @phpstan-type FileOperationSearchParamsShape = array{
 *   after?: string|null,
 *   allowsAnonymousAccess?: bool|null,
 *   before?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdAtGte?: \DateTimeInterface|null,
 *   createdAtLte?: \DateTimeInterface|null,
 *   encoding?: string|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   expiresAtGte?: \DateTimeInterface|null,
 *   expiresAtLte?: \DateTimeInterface|null,
 *   extension?: string|null,
 *   fileMd5?: string|null,
 *   height?: int|null,
 *   heightGte?: int|null,
 *   heightLte?: int|null,
 *   idGte?: int|null,
 *   idLte?: int|null,
 *   ids?: list<int>|null,
 *   isUsableInContent?: bool|null,
 *   limit?: int|null,
 *   name?: string|null,
 *   parentFolderIDs?: list<int>|null,
 *   path?: string|null,
 *   properties?: list<string>|null,
 *   size?: int|null,
 *   sizeGte?: int|null,
 *   sizeLte?: int|null,
 *   sort?: list<string>|null,
 *   type?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedAtGte?: \DateTimeInterface|null,
 *   updatedAtLte?: \DateTimeInterface|null,
 *   url?: string|null,
 *   width?: int|null,
 *   widthGte?: int|null,
 *   widthLte?: int|null,
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
    #[Optional]
    public ?string $after;

    /**
     * Search files by access. If `true`, will show only public files. If `false`, will show only private files.
     */
    #[Optional]
    public ?bool $allowsAnonymousAccess;

    #[Optional]
    public ?string $before;

    /**
     * Search files by time of creation.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Search files by greater than or equal to time of creation. Can be used with `createdAtLte` to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAtGte;

    /**
     * Search files by less than or equal to time of creation. Can be used with `createdAtGte` to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAtLte;

    /**
     * Search files by specified encoding.
     */
    #[Optional]
    public ?string $encoding;

    /**
     * Search files by exact expires time. Time must be epoch time in milliseconds.
     */
    #[Optional]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Search files by greater than or equal to expires time. Can be used with `expiresAtLte` to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $expiresAtGte;

    /**
     * Search files by less than or equal to expires time. Can be used with `expiresAtGte` to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $expiresAtLte;

    /**
     * Search files by given extension.
     */
    #[Optional]
    public ?string $extension;

    /**
     * Search files by a specific md5 hash.
     */
    #[Optional]
    public ?string $fileMd5;

    /**
     * Search files by height of image or video.
     */
    #[Optional]
    public ?int $height;

    /**
     * Search files by greater than or equal to height of image or video. Can be used with `heightLte` to create a range.
     */
    #[Optional]
    public ?int $heightGte;

    /**
     * Search files by less than or equal to height of image or video. Can be used with `heightGte` to create a range.
     */
    #[Optional]
    public ?int $heightLte;

    #[Optional]
    public ?int $idGte;

    #[Optional]
    public ?int $idLte;

    /**
     * Search by a list of file IDs.
     *
     * @var list<int>|null $ids
     */
    #[Optional(list: 'int')]
    public ?array $ids;

    /**
     * If `true`, shows files that have been marked to be used in new content. If `false`, shows files that should not be used in new content.
     */
    #[Optional]
    public ?bool $isUsableInContent;

    /**
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Search for files containing the given name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Search files within given `folderId`.
     *
     * @var list<int>|null $parentFolderIDs
     */
    #[Optional(list: 'int')]
    public ?array $parentFolderIDs;

    /**
     * Search files by path.
     */
    #[Optional]
    public ?string $path;

    /**
     * A list of file properties to return.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * Search files by exact file size in bytes.
     */
    #[Optional]
    public ?int $size;

    /**
     * Search files by greater than or equal to file size. Can be used with `sizeLte` to create a range.
     */
    #[Optional]
    public ?int $sizeGte;

    /**
     * Search files by less than or equal to file size. Can be used with `sizeGte` to create a range.
     */
    #[Optional]
    public ?int $sizeLte;

    /**
     * Sort files by a given field.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Filter by provided file type.
     */
    #[Optional]
    public ?string $type;

    /**
     * Search files by time of latest updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Search files by greater than or equal to time of latest update. Can be used with `updatedAtLte` to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAtGte;

    /**
     * Search files by less than or equal to time of latest update. Can be used with `updatedAtGte` to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAtLte;

    /**
     * Search by file URL.
     */
    #[Optional]
    public ?string $url;

    /**
     * Search files by width of image or video.
     */
    #[Optional]
    public ?int $width;

    /**
     * Search files by greater than or equal to width of image or video. Can be used with `widthLte` to create a range.
     */
    #[Optional]
    public ?int $widthGte;

    /**
     * Search files by less than or equal to width of image or video. Can be used with `widthGte` to create a range.
     */
    #[Optional]
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
     * @param list<int> $parentFolderIDs
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
        ?array $parentFolderIDs = null,
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
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $allowsAnonymousAccess && $self['allowsAnonymousAccess'] = $allowsAnonymousAccess;
        null !== $before && $self['before'] = $before;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdAtGte && $self['createdAtGte'] = $createdAtGte;
        null !== $createdAtLte && $self['createdAtLte'] = $createdAtLte;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $expiresAtGte && $self['expiresAtGte'] = $expiresAtGte;
        null !== $expiresAtLte && $self['expiresAtLte'] = $expiresAtLte;
        null !== $extension && $self['extension'] = $extension;
        null !== $fileMd5 && $self['fileMd5'] = $fileMd5;
        null !== $height && $self['height'] = $height;
        null !== $heightGte && $self['heightGte'] = $heightGte;
        null !== $heightLte && $self['heightLte'] = $heightLte;
        null !== $idGte && $self['idGte'] = $idGte;
        null !== $idLte && $self['idLte'] = $idLte;
        null !== $ids && $self['ids'] = $ids;
        null !== $isUsableInContent && $self['isUsableInContent'] = $isUsableInContent;
        null !== $limit && $self['limit'] = $limit;
        null !== $name && $self['name'] = $name;
        null !== $parentFolderIDs && $self['parentFolderIDs'] = $parentFolderIDs;
        null !== $path && $self['path'] = $path;
        null !== $properties && $self['properties'] = $properties;
        null !== $size && $self['size'] = $size;
        null !== $sizeGte && $self['sizeGte'] = $sizeGte;
        null !== $sizeLte && $self['sizeLte'] = $sizeLte;
        null !== $sort && $self['sort'] = $sort;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedAtGte && $self['updatedAtGte'] = $updatedAtGte;
        null !== $updatedAtLte && $self['updatedAtLte'] = $updatedAtLte;
        null !== $url && $self['url'] = $url;
        null !== $width && $self['width'] = $width;
        null !== $widthGte && $self['widthGte'] = $widthGte;
        null !== $widthLte && $self['widthLte'] = $widthLte;

        return $self;
    }

    /**
     * Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Search files by access. If `true`, will show only public files. If `false`, will show only private files.
     */
    public function withAllowsAnonymousAccess(bool $allowsAnonymousAccess): self
    {
        $self = clone $this;
        $self['allowsAnonymousAccess'] = $allowsAnonymousAccess;

        return $self;
    }

    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    /**
     * Search files by time of creation.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Search files by greater than or equal to time of creation. Can be used with `createdAtLte` to create a range.
     */
    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $self = clone $this;
        $self['createdAtGte'] = $createdAtGte;

        return $self;
    }

    /**
     * Search files by less than or equal to time of creation. Can be used with `createdAtGte` to create a range.
     */
    public function withCreatedAtLte(\DateTimeInterface $createdAtLte): self
    {
        $self = clone $this;
        $self['createdAtLte'] = $createdAtLte;

        return $self;
    }

    /**
     * Search files by specified encoding.
     */
    public function withEncoding(string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    /**
     * Search files by exact expires time. Time must be epoch time in milliseconds.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Search files by greater than or equal to expires time. Can be used with `expiresAtLte` to create a range.
     */
    public function withExpiresAtGte(\DateTimeInterface $expiresAtGte): self
    {
        $self = clone $this;
        $self['expiresAtGte'] = $expiresAtGte;

        return $self;
    }

    /**
     * Search files by less than or equal to expires time. Can be used with `expiresAtGte` to create a range.
     */
    public function withExpiresAtLte(\DateTimeInterface $expiresAtLte): self
    {
        $self = clone $this;
        $self['expiresAtLte'] = $expiresAtLte;

        return $self;
    }

    /**
     * Search files by given extension.
     */
    public function withExtension(string $extension): self
    {
        $self = clone $this;
        $self['extension'] = $extension;

        return $self;
    }

    /**
     * Search files by a specific md5 hash.
     */
    public function withFileMd5(string $fileMd5): self
    {
        $self = clone $this;
        $self['fileMd5'] = $fileMd5;

        return $self;
    }

    /**
     * Search files by height of image or video.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * Search files by greater than or equal to height of image or video. Can be used with `heightLte` to create a range.
     */
    public function withHeightGte(int $heightGte): self
    {
        $self = clone $this;
        $self['heightGte'] = $heightGte;

        return $self;
    }

    /**
     * Search files by less than or equal to height of image or video. Can be used with `heightGte` to create a range.
     */
    public function withHeightLte(int $heightLte): self
    {
        $self = clone $this;
        $self['heightLte'] = $heightLte;

        return $self;
    }

    public function withIDGte(int $idGte): self
    {
        $self = clone $this;
        $self['idGte'] = $idGte;

        return $self;
    }

    public function withIDLte(int $idLte): self
    {
        $self = clone $this;
        $self['idLte'] = $idLte;

        return $self;
    }

    /**
     * Search by a list of file IDs.
     *
     * @param list<int> $ids
     */
    public function withIDs(array $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }

    /**
     * If `true`, shows files that have been marked to be used in new content. If `false`, shows files that should not be used in new content.
     */
    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $self = clone $this;
        $self['isUsableInContent'] = $isUsableInContent;

        return $self;
    }

    /**
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Search for files containing the given name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Search files within given `folderId`.
     *
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $self = clone $this;
        $self['parentFolderIDs'] = $parentFolderIDs;

        return $self;
    }

    /**
     * Search files by path.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    /**
     * A list of file properties to return.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Search files by exact file size in bytes.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * Search files by greater than or equal to file size. Can be used with `sizeLte` to create a range.
     */
    public function withSizeGte(int $sizeGte): self
    {
        $self = clone $this;
        $self['sizeGte'] = $sizeGte;

        return $self;
    }

    /**
     * Search files by less than or equal to file size. Can be used with `sizeGte` to create a range.
     */
    public function withSizeLte(int $sizeLte): self
    {
        $self = clone $this;
        $self['sizeLte'] = $sizeLte;

        return $self;
    }

    /**
     * Sort files by a given field.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Filter by provided file type.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Search files by time of latest updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Search files by greater than or equal to time of latest update. Can be used with `updatedAtLte` to create a range.
     */
    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $self = clone $this;
        $self['updatedAtGte'] = $updatedAtGte;

        return $self;
    }

    /**
     * Search files by less than or equal to time of latest update. Can be used with `updatedAtGte` to create a range.
     */
    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $self = clone $this;
        $self['updatedAtLte'] = $updatedAtLte;

        return $self;
    }

    /**
     * Search by file URL.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Search files by width of image or video.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }

    /**
     * Search files by greater than or equal to width of image or video. Can be used with `widthLte` to create a range.
     */
    public function withWidthGte(int $widthGte): self
    {
        $self = clone $this;
        $self['widthGte'] = $widthGte;

        return $self;
    }

    /**
     * Search files by less than or equal to width of image or video. Can be used with `widthGte` to create a range.
     */
    public function withWidthLte(int $widthLte): self
    {
        $self = clone $this;
        $self['widthLte'] = $widthLte;

        return $self;
    }
}
