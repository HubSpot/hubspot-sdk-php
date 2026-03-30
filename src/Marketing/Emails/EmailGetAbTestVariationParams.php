<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::getAbTestVariation()
 *
 * @phpstan-type EmailGetAbTestVariationParamsShape = array{
 *   archived?: bool|null,
 *   includedProperties?: list<string>|null,
 *   includeStats?: bool|null,
 *   marketingCampaignNames?: bool|null,
 *   variantStats?: bool|null,
 *   workflowNames?: bool|null,
 * }
 */
final class EmailGetAbTestVariationParams implements BaseModel
{
    /** @use SdkModel<EmailGetAbTestVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /** @var list<string>|null $includedProperties */
    #[Optional(list: 'string')]
    public ?array $includedProperties;

    #[Optional]
    public ?bool $includeStats;

    #[Optional]
    public ?bool $marketingCampaignNames;

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
     */
    public static function with(
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $variantStats = null,
        ?bool $workflowNames = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $includedProperties && $self['includedProperties'] = $includedProperties;
        null !== $includeStats && $self['includeStats'] = $includeStats;
        null !== $marketingCampaignNames && $self['marketingCampaignNames'] = $marketingCampaignNames;
        null !== $variantStats && $self['variantStats'] = $variantStats;
        null !== $workflowNames && $self['workflowNames'] = $workflowNames;

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

    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $self = clone $this;
        $self['marketingCampaignNames'] = $marketingCampaignNames;

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
