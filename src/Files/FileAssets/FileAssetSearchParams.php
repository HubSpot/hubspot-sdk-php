<?php

declare(strict_types=1);

namespace HubSpotSDK\Files\FileAssets;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Search through files in the file manager. Does not display hidden or archived files.
 *
 * @see HubSpotSDK\Services\Files\FileAssetsService::search()
 *
 * @phpstan-type FileAssetSearchParamsShape = array{
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
final class FileAssetSearchParams implements BaseModel
{
    /** @use SdkModel<FileAssetSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?bool $allowsAnonymousAccess;

    #[Optional]
    public ?string $before;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?\DateTimeInterface $createdAtGte;

    #[Optional]
    public ?\DateTimeInterface $createdAtLte;

    #[Optional]
    public ?string $encoding;

    #[Optional]
    public ?\DateTimeInterface $expiresAt;

    #[Optional]
    public ?\DateTimeInterface $expiresAtGte;

    #[Optional]
    public ?\DateTimeInterface $expiresAtLte;

    #[Optional]
    public ?string $extension;

    #[Optional]
    public ?string $fileMd5;

    #[Optional]
    public ?int $height;

    #[Optional]
    public ?int $heightGte;

    #[Optional]
    public ?int $heightLte;

    #[Optional]
    public ?int $idGte;

    #[Optional]
    public ?int $idLte;

    /** @var list<int>|null $ids */
    #[Optional(list: 'int')]
    public ?array $ids;

    #[Optional]
    public ?bool $isUsableInContent;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $name;

    /** @var list<int>|null $parentFolderIDs */
    #[Optional(list: 'int')]
    public ?array $parentFolderIDs;

    #[Optional]
    public ?string $path;

    /** @var list<string>|null $properties */
    #[Optional(list: 'string')]
    public ?array $properties;

    #[Optional]
    public ?int $size;

    #[Optional]
    public ?int $sizeGte;

    #[Optional]
    public ?int $sizeLte;

    /** @var list<string>|null $sort */
    #[Optional(list: 'string')]
    public ?array $sort;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?\DateTimeInterface $updatedAtGte;

    #[Optional]
    public ?\DateTimeInterface $updatedAtLte;

    #[Optional]
    public ?string $url;

    #[Optional]
    public ?int $width;

    #[Optional]
    public ?int $widthGte;

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
     * @param list<int>|null $ids
     * @param list<int>|null $parentFolderIDs
     * @param list<string>|null $properties
     * @param list<string>|null $sort
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
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $self = clone $this;
        $self['createdAtGte'] = $createdAtGte;

        return $self;
    }

    public function withCreatedAtLte(\DateTimeInterface $createdAtLte): self
    {
        $self = clone $this;
        $self['createdAtLte'] = $createdAtLte;

        return $self;
    }

    public function withEncoding(string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withExpiresAtGte(\DateTimeInterface $expiresAtGte): self
    {
        $self = clone $this;
        $self['expiresAtGte'] = $expiresAtGte;

        return $self;
    }

    public function withExpiresAtLte(\DateTimeInterface $expiresAtLte): self
    {
        $self = clone $this;
        $self['expiresAtLte'] = $expiresAtLte;

        return $self;
    }

    public function withExtension(string $extension): self
    {
        $self = clone $this;
        $self['extension'] = $extension;

        return $self;
    }

    public function withFileMd5(string $fileMd5): self
    {
        $self = clone $this;
        $self['fileMd5'] = $fileMd5;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withHeightGte(int $heightGte): self
    {
        $self = clone $this;
        $self['heightGte'] = $heightGte;

        return $self;
    }

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
     * @param list<int> $ids
     */
    public function withIDs(array $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }

    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $self = clone $this;
        $self['isUsableInContent'] = $isUsableInContent;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $self = clone $this;
        $self['parentFolderIDs'] = $parentFolderIDs;

        return $self;
    }

    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withSizeGte(int $sizeGte): self
    {
        $self = clone $this;
        $self['sizeGte'] = $sizeGte;

        return $self;
    }

    public function withSizeLte(int $sizeLte): self
    {
        $self = clone $this;
        $self['sizeLte'] = $sizeLte;

        return $self;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $self = clone $this;
        $self['updatedAtGte'] = $updatedAtGte;

        return $self;
    }

    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $self = clone $this;
        $self['updatedAtLte'] = $updatedAtLte;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }

    public function withWidthGte(int $widthGte): self
    {
        $self = clone $this;
        $self['widthGte'] = $widthGte;

        return $self;
    }

    public function withWidthLte(int $widthLte): self
    {
        $self = clone $this;
        $self['widthLte'] = $widthLte;

        return $self;
    }
}
