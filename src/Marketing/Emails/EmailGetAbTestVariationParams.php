<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint lets you obtain the variation of an A/B marketing email. If the email is variation A (master) it will return variation B (variant) and vice versa.
 *
 * @see HubspotSDK\Services\Marketing\EmailsService::getAbTestVariation()
 *
 * @phpstan-type EmailGetAbTestVariationParamsShape = array{
 *   archived?: bool,
 *   includedProperties?: list<string>,
 *   includeStats?: bool,
 *   marketingCampaignNames?: bool,
 *   workflowNames?: bool,
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
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * List of properties to be returned in the API response.
     *
     * @var list<string>|null $includedProperties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $includedProperties;

    /**
     * Boolean variable to request stats to be returned in response.
     */
    #[Api(optional: true)]
    public ?bool $includeStats;

    /**
     * Boolean variable to request name of the campaign in response.
     */
    #[Api(optional: true)]
    public ?bool $marketingCampaignNames;

    /**
     * Boolean variable to request name of the associated workflows in response.
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

        null !== $archived && $obj['archived'] = $archived;
        null !== $includedProperties && $obj['includedProperties'] = $includedProperties;
        null !== $includeStats && $obj['includeStats'] = $includeStats;
        null !== $marketingCampaignNames && $obj['marketingCampaignNames'] = $marketingCampaignNames;
        null !== $workflowNames && $obj['workflowNames'] = $workflowNames;

        return $obj;
    }

    /**
     * Boolean variable to request archived email.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * List of properties to be returned in the API response.
     *
     * @param list<string> $includedProperties
     */
    public function withIncludedProperties(array $includedProperties): self
    {
        $obj = clone $this;
        $obj['includedProperties'] = $includedProperties;

        return $obj;
    }

    /**
     * Boolean variable to request stats to be returned in response.
     */
    public function withIncludeStats(bool $includeStats): self
    {
        $obj = clone $this;
        $obj['includeStats'] = $includeStats;

        return $obj;
    }

    /**
     * Boolean variable to request name of the campaign in response.
     */
    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $obj = clone $this;
        $obj['marketingCampaignNames'] = $marketingCampaignNames;

        return $obj;
    }

    /**
     * Boolean variable to request name of the associated workflows in response.
     */
    public function withWorkflowNames(bool $workflowNames): self
    {
        $obj = clone $this;
        $obj['workflowNames'] = $workflowNames;

        return $obj;
    }
}
