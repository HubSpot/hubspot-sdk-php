<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailListParams\Type;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmailListParams); // set properties as needed
 * $client->marketing.emails->list(...$params->toArray());
 * ```
 * Get all marketing emails.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->list(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->list
 *
 * @phpstan-type email_list_params = array{
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
    /** @use SdkModel<email_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $campaign;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAfter;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdBefore;

    /** @var list<string>|null $includedProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $includedProperties;

    #[Api(optional: true)]
    public ?bool $includeStats;

    #[Api(optional: true)]
    public ?bool $isPublished;

    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?bool $marketingCampaignNames;

    /** @var list<string>|null $sort */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAfter;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedBefore;

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

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $obj = clone $this;
        $obj->createdAfter = $createdAfter;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $obj = clone $this;
        $obj->createdBefore = $createdBefore;

        return $obj;
    }

    /**
     * @param list<string> $includedProperties
     */
    public function withIncludedProperties(array $includedProperties): self
    {
        $obj = clone $this;
        $obj->includedProperties = $includedProperties;

        return $obj;
    }

    public function withIncludeStats(bool $includeStats): self
    {
        $obj = clone $this;
        $obj->includeStats = $includeStats;

        return $obj;
    }

    public function withIsPublished(bool $isPublished): self
    {
        $obj = clone $this;
        $obj->isPublished = $isPublished;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $obj = clone $this;
        $obj->marketingCampaignNames = $marketingCampaignNames;

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

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $obj = clone $this;
        $obj->updatedAfter = $updatedAfter;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $obj = clone $this;
        $obj->updatedBefore = $updatedBefore;

        return $obj;
    }

    public function withWorkflowNames(bool $workflowNames): self
    {
        $obj = clone $this;
        $obj->workflowNames = $workflowNames;

        return $obj;
    }
}
