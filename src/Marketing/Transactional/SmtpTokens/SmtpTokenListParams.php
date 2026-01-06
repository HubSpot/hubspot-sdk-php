<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional\SmtpTokens;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Query multiple SMTP API tokens by campaign name or a single token by emailCampaignId.
 *
 * @see HubspotSDK\Services\Marketing\Transactional\SmtpTokensService::list()
 *
 * @phpstan-type SmtpTokenListParamsShape = array{
 *   after?: string, campaignName?: string, emailCampaignID?: string, limit?: int
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
    #[Optional]
    public ?string $after;

    /**
     * A name for the campaign tied to the SMTP API token.
     */
    #[Optional]
    public ?string $campaignName;

    /**
     * Identifier assigned to the campaign provided during the token creation.
     */
    #[Optional]
    public ?string $emailCampaignID;

    /**
     * Maximum number of tokens to return.
     */
    #[Optional]
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
        ?string $emailCampaignID = null,
        ?int $limit = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $campaignName && $obj['campaignName'] = $campaignName;
        null !== $emailCampaignID && $obj['emailCampaignID'] = $emailCampaignID;
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
        $obj['emailCampaignID'] = $emailCampaignID;

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
