<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new EmailReadParams); // set properties as needed
 * $client->marketing.emails->read(...$params->toArray());
 * ```
 * Get the details of a specified marketing email.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->marketing.emails->read(...$params->toArray());`
 *
 * @see HubspotSDK\Marketing\Emails->read
 *
 * @phpstan-type email_read_params = array{
 *   archived?: bool,
 *   includedProperties?: list<string>,
 *   includeStats?: bool,
 *   marketingCampaignNames?: bool,
 *   workflowNames?: bool,
 * }
 */
final class EmailReadParams implements BaseModel
{
    /** @use SdkModel<email_read_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

    /** @var list<string>|null $includedProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $includedProperties;

    #[Api(optional: true)]
    public ?bool $includeStats;

    #[Api(optional: true)]
    public ?bool $marketingCampaignNames;

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

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

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

    public function withMarketingCampaignNames(
        bool $marketingCampaignNames
    ): self {
        $obj = clone $this;
        $obj->marketingCampaignNames = $marketingCampaignNames;

        return $obj;
    }

    public function withWorkflowNames(bool $workflowNames): self
    {
        $obj = clone $this;
        $obj->workflowNames = $workflowNames;

        return $obj;
    }
}
