<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;

/**
 * The results can be filtered, allowing you to find a specific set of emails. See the table below for a full list of filtering options.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::list()
 *
 * @phpstan-type EmailListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   campaign?: string|null,
 *   createdAfter?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdBefore?: \DateTimeInterface|null,
 *   includedProperties?: list<string>|null,
 *   includeStats?: bool|null,
 *   isPublished?: bool|null,
 *   limit?: int|null,
 *   marketingCampaignNames?: bool|null,
 *   publishedAfter?: \DateTimeInterface|null,
 *   publishedAt?: \DateTimeInterface|null,
 *   publishedBefore?: \DateTimeInterface|null,
 *   sort?: list<string>|null,
 *   type?: null|Type|value-of<Type>,
 *   updatedAfter?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedBefore?: \DateTimeInterface|null,
 *   workflowNames?: bool|null,
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
    #[Optional]
    public ?string $after;

    /**
     * Specifies whether to return archived emails. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Filter by campaign GUID. All emails will be returned if not present.
     */
    #[Optional]
    public ?string $campaign;

    /**
     * Only return emails created after the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Only return emails created at exactly the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Only return emails created before the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdBefore;

    /**
     * Limit the response to only include this specified list of properties.
     *
     * @var list<string>|null $includedProperties
     */
    #[Optional(list: 'string')]
    public ?array $includedProperties;

    /**
     * Include statistics with emails.
     */
    #[Optional]
    public ?bool $includeStats;

    /**
     * Filter by published/draft emails. All emails will be returned if not present.
     */
    #[Optional]
    public ?bool $isPublished;

    /**
     * The maximum number of results to return. Default is 10.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Include the names for any associated marketing campaigns.
     */
    #[Optional]
    public ?bool $marketingCampaignNames;

    #[Optional]
    public ?\DateTimeInterface $publishedAfter;

    #[Optional]
    public ?\DateTimeInterface $publishedAt;

    #[Optional]
    public ?\DateTimeInterface $publishedBefore;

    /**
     * Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Email types to be filtered by. Multiple types can be included. All emails will be returned if not present.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Only return emails last updated after the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Only return emails last updated at exactly the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Only return emails last updated before the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedBefore;

    /**
     * Include the names of any workflows associated with the returned emails.
     */
    #[Optional]
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
        ?\DateTimeInterface $publishedAfter = null,
        ?\DateTimeInterface $publishedAt = null,
        ?\DateTimeInterface $publishedBefore = null,
        ?array $sort = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        ?bool $workflowNames = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $campaign && $self['campaign'] = $campaign;
        null !== $createdAfter && $self['createdAfter'] = $createdAfter;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdBefore && $self['createdBefore'] = $createdBefore;
        null !== $includedProperties && $self['includedProperties'] = $includedProperties;
        null !== $includeStats && $self['includeStats'] = $includeStats;
        null !== $isPublished && $self['isPublished'] = $isPublished;
        null !== $limit && $self['limit'] = $limit;
        null !== $marketingCampaignNames && $self['marketingCampaignNames'] = $marketingCampaignNames;
        null !== $publishedAfter && $self['publishedAfter'] = $publishedAfter;
        null !== $publishedAt && $self['publishedAt'] = $publishedAt;
        null !== $publishedBefore && $self['publishedBefore'] = $publishedBefore;
        null !== $sort && $self['sort'] = $sort;
        null !== $type && $self['type'] = $type;
        null !== $updatedAfter && $self['updatedAfter'] = $updatedAfter;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedBefore && $self['updatedBefore'] = $updatedBefore;
        null !== $workflowNames && $self['workflowNames'] = $workflowNames;

        return $self;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Specifies whether to return archived emails. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Filter by campaign GUID. All emails will be returned if not present.
     */
    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * Only return emails created after the specified time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $self = clone $this;
        $self['createdAfter'] = $createdAfter;

        return $self;
    }

    /**
     * Only return emails created at exactly the specified time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Only return emails created before the specified time.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $self = clone $this;
        $self['createdBefore'] = $createdBefore;

        return $self;
    }

    /**
     * Limit the response to only include this specified list of properties.
     *
     * @param list<string> $includedProperties
     */
    public function withIncludedProperties(array $includedProperties): self
    {
        $self = clone $this;
        $self['includedProperties'] = $includedProperties;

        return $self;
    }

    /**
     * Include statistics with emails.
     */
    public function withIncludeStats(bool $includeStats): self
    {
        $self = clone $this;
        $self['includeStats'] = $includeStats;

        return $self;
    }

    /**
     * Filter by published/draft emails. All emails will be returned if not present.
     */
    public function withIsPublished(bool $isPublished): self
    {
        $self = clone $this;
        $self['isPublished'] = $isPublished;

        return $self;
    }

    /**
     * The maximum number of results to return. Default is 10.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Include the names for any associated marketing campaigns.
     */
    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $self = clone $this;
        $self['marketingCampaignNames'] = $marketingCampaignNames;

        return $self;
    }

    public function withPublishedAfter(\DateTimeInterface $publishedAfter): self
    {
        $self = clone $this;
        $self['publishedAfter'] = $publishedAfter;

        return $self;
    }

    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $self = clone $this;
        $self['publishedAt'] = $publishedAt;

        return $self;
    }

    public function withPublishedBefore(
        \DateTimeInterface $publishedBefore
    ): self {
        $self = clone $this;
        $self['publishedBefore'] = $publishedBefore;

        return $self;
    }

    /**
     * Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
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
     * Email types to be filtered by. Multiple types can be included. All emails will be returned if not present.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Only return emails last updated after the specified time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $self = clone $this;
        $self['updatedAfter'] = $updatedAfter;

        return $self;
    }

    /**
     * Only return emails last updated at exactly the specified time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Only return emails last updated before the specified time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $self = clone $this;
        $self['updatedBefore'] = $updatedBefore;

        return $self;
    }

    /**
     * Include the names of any workflows associated with the returned emails.
     */
    public function withWorkflowNames(bool $workflowNames): self
    {
        $self = clone $this;
        $self['workflowNames'] = $workflowNames;

        return $self;
    }
}
