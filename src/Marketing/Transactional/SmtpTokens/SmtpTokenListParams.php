<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional\SmtpTokens;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Query multiple SMTP API tokens by campaign name or a single token by emailCampaignId.
 *
 * @see HubspotSDK\Services\Marketing\Transactional\SmtpTokensService::list()
 *
 * @phpstan-type SmtpTokenListParamsShape = array{
 *   after?: string, campaignName?: string, emailCampaignId?: string, limit?: int
 * }
 */
final class SmtpTokenListParams implements BaseModel
{
    /** @use SdkModel<SmtpTokenListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Starting point to get the next set of results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * A name for the campaign tied to the SMTP API token.
     */
    #[Api(optional: true)]
    public ?string $campaignName;

    /**
     * Identifier assigned to the campaign provided during the token creation.
     */
    #[Api(optional: true)]
    public ?string $emailCampaignId;

    /**
     * Maximum number of tokens to return.
     */
    #[Api(optional: true)]
    public ?int $limit;

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
        ?string $after = null,
        ?string $campaignName = null,
        ?string $emailCampaignId = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $campaignName && $obj['campaignName'] = $campaignName;
        null !== $emailCampaignId && $obj['emailCampaignId'] = $emailCampaignId;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * Starting point to get the next set of results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * A name for the campaign tied to the SMTP API token.
     */
    public function withCampaignName(string $campaignName): self
    {
        $obj = clone $this;
        $obj['campaignName'] = $campaignName;

        return $obj;
    }

    /**
     * Identifier assigned to the campaign provided during the token creation.
     */
    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $obj = clone $this;
        $obj['emailCampaignId'] = $emailCampaignID;

        return $obj;
    }

    /**
     * Maximum number of tokens to return.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
