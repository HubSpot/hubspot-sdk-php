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
 *   workflowNames?: bool|null,
 * }
 */
final class EmailGetAbTestVariationParams implements BaseModel
{
    /** @use SdkModel<EmailGetAbTestVariationParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Boolean variable to request archived email.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * List of properties to be returned in the API response.
     *
     * @var list<string>|null $includedProperties
     */
    #[Optional(list: 'string')]
    public ?array $includedProperties;

    /**
     * Boolean variable to request stats to be returned in response.
     */
    #[Optional]
    public ?bool $includeStats;

    /**
     * Boolean variable to request name of the campaign in response.
     */
    #[Optional]
    public ?bool $marketingCampaignNames;

    /**
     * Boolean variable to request name of the associated workflows in response.
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
     */
    public static function with(
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $workflowNames = null,
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $includedProperties && $self['includedProperties'] = $includedProperties;
        null !== $includeStats && $self['includeStats'] = $includeStats;
        null !== $marketingCampaignNames && $self['marketingCampaignNames'] = $marketingCampaignNames;
        null !== $workflowNames && $self['workflowNames'] = $workflowNames;

        return $self;
    }

    /**
     * Boolean variable to request archived email.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * List of properties to be returned in the API response.
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
     * Boolean variable to request stats to be returned in response.
     */
    public function withIncludeStats(bool $includeStats): self
    {
        $self = clone $this;
        $self['includeStats'] = $includeStats;

        return $self;
    }

    /**
     * Boolean variable to request name of the campaign in response.
     */
    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $self = clone $this;
        $self['marketingCampaignNames'] = $marketingCampaignNames;

        return $self;
    }

    /**
     * Boolean variable to request name of the associated workflows in response.
     */
    public function withWorkflowNames(bool $workflowNames): self
    {
        $self = clone $this;
        $self['workflowNames'] = $workflowNames;

        return $self;
    }
}
