<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new HubdbListDraftsParams); // set properties as needed
 * $client->cms.hubdb->listDrafts(...$params->toArray());
 * ```
 * Returns the details for each draft table defined in the specified account, including column definitions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->listDrafts(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->listDrafts
 *
 * @phpstan-type hubdb_list_drafts_params = array{
 *   after?: string,
 *   archived?: bool,
 *   contentType?: string,
 *   createdAfter?: \DateTimeInterface,
 *   createdAt?: \DateTimeInterface,
 *   createdBefore?: \DateTimeInterface,
 *   isGetLocalizedSchema?: bool,
 *   limit?: int,
 *   sort?: list<string>,
 *   updatedAfter?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 *   updatedBefore?: \DateTimeInterface,
 * }
 */
final class HubdbListDraftsParams implements BaseModel
{
    /** @use SdkModel<hubdb_list_drafts_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Specifies whether to return archived tables. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $contentType;

    /**
     * Only return tables created after the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Only return tables created at exactly the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Only return tables created before the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdBefore;

    #[Api(optional: true)]
    public ?bool $isGetLocalizedSchema;

    /**
     * The maximum number of results to return. Default is 1000.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Only return tables last updated after the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Only return tables last updated at exactly the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Only return tables last updated before the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedBefore;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?string $contentType = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?bool $isGetLocalizedSchema = null,
        ?int $limit = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $contentType && $obj->contentType = $contentType;
        null !== $createdAfter && $obj->createdAfter = $createdAfter;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdBefore && $obj->createdBefore = $createdBefore;
        null !== $isGetLocalizedSchema && $obj->isGetLocalizedSchema = $isGetLocalizedSchema;
        null !== $limit && $obj->limit = $limit;
        null !== $sort && $obj->sort = $sort;
        null !== $updatedAfter && $obj->updatedAfter = $updatedAfter;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedBefore && $obj->updatedBefore = $updatedBefore;

        return $obj;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Specifies whether to return archived tables. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType;

        return $obj;
    }

    /**
     * Only return tables created after the specified time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $obj = clone $this;
        $obj->createdAfter = $createdAfter;

        return $obj;
    }

    /**
     * Only return tables created at exactly the specified time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Only return tables created before the specified time.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $obj = clone $this;
        $obj->createdBefore = $createdBefore;

        return $obj;
    }

    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $obj = clone $this;
        $obj->isGetLocalizedSchema = $isGetLocalizedSchema;

        return $obj;
    }

    /**
     * The maximum number of results to return. Default is 1000.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
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
     * Only return tables last updated after the specified time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $obj = clone $this;
        $obj->updatedAfter = $updatedAfter;

        return $obj;
    }

    /**
     * Only return tables last updated at exactly the specified time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Only return tables last updated before the specified time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $obj = clone $this;
        $obj->updatedBefore = $updatedBefore;

        return $obj;
    }
}
