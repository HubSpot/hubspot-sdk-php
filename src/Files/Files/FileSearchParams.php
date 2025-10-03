<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FileSearchParams); // set properties as needed
 * $client->files.files->search(...$params->toArray());
 * ```
 * Search files.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.files->search(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Files->search
 *
 * @phpstan-type file_search_params = array{
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
 *   parentFolderIDs?: list<int>,
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
final class FileSearchParams implements BaseModel
{
    /** @use SdkModel<file_search_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $allowsAnonymousAccess;

    #[Api(optional: true)]
    public ?string $before;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtGte;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtLte;

    #[Api(optional: true)]
    public ?string $encoding;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAtGte;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAtLte;

    #[Api(optional: true)]
    public ?string $extension;

    #[Api(optional: true)]
    public ?string $fileMd5;

    #[Api(optional: true)]
    public ?int $height;

    #[Api(optional: true)]
    public ?int $heightGte;

    #[Api(optional: true)]
    public ?int $heightLte;

    #[Api(optional: true)]
    public ?int $idGte;

    #[Api(optional: true)]
    public ?int $idLte;

    /** @var list<int>|null $ids */
    #[Api(list: 'int', optional: true)]
    public ?array $ids;

    #[Api(optional: true)]
    public ?bool $isUsableInContent;

    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?string $name;

    /** @var list<int>|null $parentFolderIDs */
    #[Api(list: 'int', optional: true)]
    public ?array $parentFolderIDs;

    #[Api(optional: true)]
    public ?string $path;

    /** @var list<string>|null $properties */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    #[Api(optional: true)]
    public ?int $size;

    #[Api(optional: true)]
    public ?int $sizeGte;

    #[Api(optional: true)]
    public ?int $sizeLte;

    /** @var list<string>|null $sort */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    #[Api(optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAtGte;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAtLte;

    #[Api(optional: true)]
    public ?string $url;

    #[Api(optional: true)]
    public ?int $width;

    #[Api(optional: true)]
    public ?int $widthGte;

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
        null !== $parentFolderIDs && $obj->parentFolderIDs = $parentFolderIDs;
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

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $obj = clone $this;
        $obj->createdAtGte = $createdAtGte;

        return $obj;
    }

    public function withCreatedAtLte(\DateTimeInterface $createdAtLte): self
    {
        $obj = clone $this;
        $obj->createdAtLte = $createdAtLte;

        return $obj;
    }

    public function withEncoding(string $encoding): self
    {
        $obj = clone $this;
        $obj->encoding = $encoding;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withExpiresAtGte(\DateTimeInterface $expiresAtGte): self
    {
        $obj = clone $this;
        $obj->expiresAtGte = $expiresAtGte;

        return $obj;
    }

    public function withExpiresAtLte(\DateTimeInterface $expiresAtLte): self
    {
        $obj = clone $this;
        $obj->expiresAtLte = $expiresAtLte;

        return $obj;
    }

    public function withExtension(string $extension): self
    {
        $obj = clone $this;
        $obj->extension = $extension;

        return $obj;
    }

    public function withFileMd5(string $fileMd5): self
    {
        $obj = clone $this;
        $obj->fileMd5 = $fileMd5;

        return $obj;
    }

    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    public function withHeightGte(int $heightGte): self
    {
        $obj = clone $this;
        $obj->heightGte = $heightGte;

        return $obj;
    }

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
     * @param list<int> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }

    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $obj = clone $this;
        $obj->isUsableInContent = $isUsableInContent;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $obj = clone $this;
        $obj->parentFolderIDs = $parentFolderIDs;

        return $obj;
    }

    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    public function withSizeGte(int $sizeGte): self
    {
        $obj = clone $this;
        $obj->sizeGte = $sizeGte;

        return $obj;
    }

    public function withSizeLte(int $sizeLte): self
    {
        $obj = clone $this;
        $obj->sizeLte = $sizeLte;

        return $obj;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $obj = clone $this;
        $obj->updatedAtGte = $updatedAtGte;

        return $obj;
    }

    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $obj = clone $this;
        $obj->updatedAtLte = $updatedAtLte;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }

    public function withWidthGte(int $widthGte): self
    {
        $obj = clone $this;
        $obj->widthGte = $widthGte;

        return $obj;
    }

    public function withWidthLte(int $widthLte): self
    {
        $obj = clone $this;
        $obj->widthLte = $widthLte;

        return $obj;
    }
}
