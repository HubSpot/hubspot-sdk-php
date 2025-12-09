<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowEmailCampaignShape = array{
 *   emailCampaignID: string, emailContentID: string, flowID: string
 * }
 */
final class APIFlowEmailCampaign implements BaseModel
{
    /** @use SdkModel<APIFlowEmailCampaignShape> */
    use SdkModel;

    #[Required('emailCampaignId')]
    public string $emailCampaignID;

    #[Required('emailContentId')]
    public string $emailContentID;

    #[Required('flowId')]
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
        $self = new self;

        $self['emailCampaignID'] = $emailCampaignID;
        $self['emailContentID'] = $emailContentID;
        $self['flowID'] = $flowID;

        return $self;
    }

    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $self = clone $this;
        $self['emailCampaignID'] = $emailCampaignID;

        return $self;
    }

    public function withEmailContentID(string $emailContentID): self
    {
        $self = clone $this;
        $self['emailContentID'] = $emailContentID;

        return $self;
    }

    public function withFlowID(string $flowID): self
    {
        $self = clone $this;
        $self['flowID'] = $flowID;

        return $self;
    }
}
