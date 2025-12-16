<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for a marketing email.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::get()
 *
 * @phpstan-type EmailGetParamsShape = array{
 *   archived?: bool|null,
 *   includedProperties?: list<string>|null,
 *   includeStats?: bool|null,
 *   marketingCampaignNames?: bool|null,
 *   workflowNames?: bool|null,
 * }
 */
final class EmailGetParams implements BaseModel
{
    /** @use SdkModel<EmailGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Limit the response to only include the specified properties.
     *
     * @var list<string>|null $includedProperties
     */
    #[Optional(list: 'string')]
    public ?array $includedProperties;

    /**
     * Include statistics with email.
     */
    #[Optional]
    public ?bool $includeStats;

    /**
     * If set to true, loads `campaignName` and `campaignUtm`.
     */
    #[Optional]
    public ?bool $marketingCampaignNames;

    /**
     * If set to true, loads workflows in which the email is used within a "send email" action.
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
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Limit the response to only include the specified properties.
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
     * Include statistics with email.
     */
    public function withIncludeStats(bool $includeStats): self
    {
        $self = clone $this;
        $self['includeStats'] = $includeStats;

        return $self;
    }

    /**
     * If set to true, loads `campaignName` and `campaignUtm`.
     */
    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $self = clone $this;
        $self['marketingCampaignNames'] = $marketingCampaignNames;

        return $self;
    }

    /**
     * If set to true, loads workflows in which the email is used within a "send email" action.
     */
    public function withWorkflowNames(bool $workflowNames): self
    {
        $self = clone $this;
        $self['workflowNames'] = $workflowNames;

        return $self;
    }
}
