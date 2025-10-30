<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;

/**
 * The results can be filtered, allowing you to find a specific set of emails. See the table below for a full list of filtering options.
 *
 * @see HubspotSDK\Marketing\Emails->list
 *
 * @phpstan-type EmailListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   campaign?: string,
 *   createdAfter?: \DateTimeInterface,
 *   createdAt?: \DateTimeInterface,
 *   createdBefore?: \DateTimeInterface,
 *   includedProperties?: list<string>,
 *   includeStats?: bool,
 *   isPublished?: bool,
 *   limit?: int,
 *   marketingCampaignNames?: bool,
 *   sort?: list<string>,
 *   type?: Type|value-of<Type>,
 *   updatedAfter?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 *   updatedBefore?: \DateTimeInterface,
 *   workflowNames?: bool,
 * }
 */
final class EmailListParams implements BaseModel
{
    /** @use SdkModel<EmailListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Specifies whether to return archived emails. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Filter by campaign GUID. All emails will be returned if not present.
     */
    #[Api(optional: true)]
    public ?string $campaign;

    /**
     * Only return emails created after the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Only return emails created at exactly the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Only return emails created before the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdBefore;

    /**
     * Limit the response to only include this specified list of properties.
     *
     * @var list<string>|null $includedProperties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $includedProperties;

    /**
     * Include statistics with emails.
     */
    #[Api(optional: true)]
    public ?bool $includeStats;

    /**
     * Filter by published/draft emails. All emails will be returned if not present.
     */
    #[Api(optional: true)]
    public ?bool $isPublished;

    /**
     * The maximum number of results to return. Default is 10.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Include the names for any associated marketing campaigns.
     */
    #[Api(optional: true)]
    public ?bool $marketingCampaignNames;

    /**
     * Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Email types to be filtered by. Multiple types can be included. All emails will be returned if not present.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * Only return emails last updated after the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Only return emails last updated at exactly the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Only return emails last updated before the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedBefore;

    /**
     * Include the names of any workflows associated with the returned emails.
     */
    #[Api(optional: true)]
    public ?bool $workflowNames;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $includedProperties
     * @param list<string> $sort
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?string $campaign = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $isPublished = null,
        ?int $limit = null,
        ?bool $marketingCampaignNames = null,
        ?array $sort = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        ?bool $workflowNames = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $campaign && $obj->campaign = $campaign;
        null !== $createdAfter && $obj->createdAfter = $createdAfter;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdBefore && $obj->createdBefore = $createdBefore;
        null !== $includedProperties && $obj->includedProperties = $includedProperties;
        null !== $includeStats && $obj->includeStats = $includeStats;
        null !== $isPublished && $obj->isPublished = $isPublished;
        null !== $limit && $obj->limit = $limit;
        null !== $marketingCampaignNames && $obj->marketingCampaignNames = $marketingCampaignNames;
        null !== $sort && $obj->sort = $sort;
        null !== $type && $obj['type'] = $type;
        null !== $updatedAfter && $obj->updatedAfter = $updatedAfter;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedBefore && $obj->updatedBefore = $updatedBefore;
        null !== $workflowNames && $obj->workflowNames = $workflowNames;

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
     * Specifies whether to return archived emails. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Filter by campaign GUID. All emails will be returned if not present.
     */
    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    /**
     * Only return emails created after the specified time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $obj = clone $this;
        $obj->createdAfter = $createdAfter;

        return $obj;
    }

    /**
     * Only return emails created at exactly the specified time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Only return emails created before the specified time.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $obj = clone $this;
        $obj->createdBefore = $createdBefore;

        return $obj;
    }

    /**
     * Limit the response to only include this specified list of properties.
     *
     * @param list<string> $includedProperties
     */
    public function withIncludedProperties(array $includedProperties): self
    {
        $obj = clone $this;
        $obj->includedProperties = $includedProperties;

        return $obj;
    }

    /**
     * Include statistics with emails.
     */
    public function withIncludeStats(bool $includeStats): self
    {
        $obj = clone $this;
        $obj->includeStats = $includeStats;

        return $obj;
    }

    /**
     * Filter by published/draft emails. All emails will be returned if not present.
     */
    public function withIsPublished(bool $isPublished): self
    {
        $obj = clone $this;
        $obj->isPublished = $isPublished;

        return $obj;
    }

    /**
     * The maximum number of results to return. Default is 10.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Include the names for any associated marketing campaigns.
     */
    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $obj = clone $this;
        $obj->marketingCampaignNames = $marketingCampaignNames;

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
     * Email types to be filtered by. Multiple types can be included. All emails will be returned if not present.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Only return emails last updated after the specified time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $obj = clone $this;
        $obj->updatedAfter = $updatedAfter;

        return $obj;
    }

    /**
     * Only return emails last updated at exactly the specified time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Only return emails last updated before the specified time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $obj = clone $this;
        $obj->updatedBefore = $updatedBefore;

        return $obj;
    }

    /**
     * Include the names of any workflows associated with the returned emails.
     */
    public function withWorkflowNames(bool $workflowNames): self
    {
        $obj = clone $this;
        $obj->workflowNames = $workflowNames;

        return $obj;
    }
}
