<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_flow_email_campaign = array{
 *   emailCampaignID: string, emailContentID: string, flowID: string
 * }
 */
final class APIFlowEmailCampaign implements BaseModel
{
    /** @use SdkModel<api_flow_email_campaign> */
    use SdkModel;

    #[Api('emailCampaignId')]
    public string $emailCampaignID;

    #[Api('emailContentId')]
    public string $emailContentID;

    #[Api('flowId')]
    public string $flowID;

    /**
     * `new APIFlowEmailCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowEmailCampaign::with(
     *   emailCampaignID: ..., emailContentID: ..., flowID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowEmailCampaign)
     *   ->withEmailCampaignID(...)
     *   ->withEmailContentID(...)
     *   ->withFlowID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $emailCampaignID,
        string $emailContentID,
        string $flowID
    ): self {
        $obj = new self;

        $obj->emailCampaignID = $emailCampaignID;
        $obj->emailContentID = $emailContentID;
        $obj->flowID = $flowID;

        return $obj;
    }

    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $obj = clone $this;
        $obj->emailCampaignID = $emailCampaignID;

        return $obj;
    }

    public function withEmailContentID(string $emailContentID): self
    {
        $obj = clone $this;
        $obj->emailContentID = $emailContentID;

        return $obj;
    }

    public function withFlowID(string $flowID): self
    {
        $obj = clone $this;
        $obj->flowID = $flowID;

        return $obj;
    }
}
