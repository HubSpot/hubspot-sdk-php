<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;

/**
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
 *   variantStats?: bool|null,
 *   workflowNames?: bool|null,
 * }
 */
final class EmailListParams implements BaseModel
{
    /** @use SdkModel<EmailListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?string $campaign;

    #[Optional]
    public ?\DateTimeInterface $createdAfter;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?\DateTimeInterface $createdBefore;

    /** @var list<string>|null $includedProperties */
    #[Optional(list: 'string')]
    public ?array $includedProperties;

    #[Optional]
    public ?bool $includeStats;

    #[Optional]
    public ?bool $isPublished;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?bool $marketingCampaignNames;

    #[Optional]
    public ?\DateTimeInterface $publishedAfter;

    #[Optional]
    public ?\DateTimeInterface $publishedAt;

    #[Optional]
    public ?\DateTimeInterface $publishedBefore;

    /** @var list<string>|null $sort */
    #[Optional(list: 'string')]
    public ?array $sort;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    #[Optional]
    public ?\DateTimeInterface $updatedAfter;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?\DateTimeInterface $updatedBefore;

    #[Optional]
    public ?bool $variantStats;

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
     * @param list<string>|null $includedProperties
     * @param list<string>|null $sort
     * @param Type|value-of<Type>|null $type
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
        ?bool $variantStats = null,
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
        null !== $variantStats && $self['variantStats'] = $variantStats;
        null !== $workflowNames && $self['workflowNames'] = $workflowNames;

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

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $self = clone $this;
        $self['createdAfter'] = $createdAfter;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $self = clone $this;
        $self['createdBefore'] = $createdBefore;

        return $self;
    }

    /**
     * @param list<string> $includedProperties
     */
    public function withIncludedProperties(array $includedProperties): self
    {
        $self = clone $this;
        $self['includedProperties'] = $includedProperties;

        return $self;
    }

    public function withIncludeStats(bool $includeStats): self
    {
        $self = clone $this;
        $self['includeStats'] = $includeStats;

        return $self;
    }

    public function withIsPublished(bool $isPublished): self
    {
        $self = clone $this;
        $self['isPublished'] = $isPublished;

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
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $self = clone $this;
        $self['updatedAfter'] = $updatedAfter;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $self = clone $this;
        $self['updatedBefore'] = $updatedBefore;

        return $self;
    }

    public function withVariantStats(bool $variantStats): self
    {
        $self = clone $this;
        $self['variantStats'] = $variantStats;

        return $self;
    }

    public function withWorkflowNames(bool $workflowNames): self
    {
        $self = clone $this;
        $self['workflowNames'] = $workflowNames;

        return $self;
    }
}
