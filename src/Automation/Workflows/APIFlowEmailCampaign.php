<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowEmailCampaignShape = array{
 *   emailCampaignId: string, emailContentId: string, flowId: string
 * }
 */
final class APIFlowEmailCampaign implements BaseModel
{
    /** @use SdkModel<APIFlowEmailCampaignShape> */
    use SdkModel;

    #[Required]
    public string $emailCampaignId;

    #[Required]
    public string $emailContentId;

    #[Required]
    public string $flowId;

    /**
     * `new APIFlowEmailCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowEmailCampaign::with(
     *   emailCampaignId: ..., emailContentId: ..., flowId: ...
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
        string $emailCampaignId,
        string $emailContentId,
        string $flowId
    ): self {
        $obj = new self;

        $obj['emailCampaignId'] = $emailCampaignId;
        $obj['emailContentId'] = $emailContentId;
        $obj['flowId'] = $flowId;

        return $obj;
    }

    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $obj = clone $this;
        $obj['emailCampaignId'] = $emailCampaignID;

        return $obj;
    }

    public function withEmailContentID(string $emailContentID): self
    {
        $obj = clone $this;
        $obj['emailContentId'] = $emailContentID;

        return $obj;
    }

    public function withFlowID(string $flowID): self
    {
        $obj = clone $this;
        $obj['flowId'] = $flowID;

        return $obj;
    }
}
