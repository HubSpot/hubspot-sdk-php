<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for a marketing email.
 *
 * @see HubspotSDK\Marketing\Emails->get
 *
 * @phpstan-type EmailGetParamsShape = array{
 *   archived?: bool,
 *   includedProperties?: list<string>,
 *   includeStats?: bool,
 *   marketingCampaignNames?: bool,
 *   workflowNames?: bool,
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
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Limit the response to only include the specified properties.
     *
     * @var list<string>|null $includedProperties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $includedProperties;

    /**
     * Include statistics with email.
     */
    #[Api(optional: true)]
    public ?bool $includeStats;

    /**
     * If set to true, loads `campaignName` and `campaignUtm`.
     */
    #[Api(optional: true)]
    public ?bool $marketingCampaignNames;

    /**
     * If set to true, loads workflows in which the email is used within a "send email" action.
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
     */
    public static function with(
        ?bool $archived = null,
        ?array $includedProperties = null,
        ?bool $includeStats = null,
        ?bool $marketingCampaignNames = null,
        ?bool $workflowNames = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $includedProperties && $obj->includedProperties = $includedProperties;
        null !== $includeStats && $obj->includeStats = $includeStats;
        null !== $marketingCampaignNames && $obj->marketingCampaignNames = $marketingCampaignNames;
        null !== $workflowNames && $obj->workflowNames = $workflowNames;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Limit the response to only include the specified properties.
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
     * Include statistics with email.
     */
    public function withIncludeStats(bool $includeStats): self
    {
        $obj = clone $this;
        $obj->includeStats = $includeStats;

        return $obj;
    }

    /**
     * If set to true, loads `campaignName` and `campaignUtm`.
     */
    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $obj = clone $this;
        $obj->marketingCampaignNames = $marketingCampaignNames;

        return $obj;
    }

    /**
     * If set to true, loads workflows in which the email is used within a "send email" action.
     */
    public function withWorkflowNames(bool $workflowNames): self
    {
        $obj = clone $this;
        $obj->workflowNames = $workflowNames;

        return $obj;
    }
}
