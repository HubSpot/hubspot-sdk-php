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
 *   after?: string|null,
 *   campaignName?: string|null,
 *   emailCampaignID?: string|null,
 *   limit?: int|null,
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
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $campaignName && $self['campaignName'] = $campaignName;
        null !== $emailCampaignID && $self['emailCampaignID'] = $emailCampaignID;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * Starting point to get the next set of results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * A name for the campaign tied to the SMTP API token.
     */
    public function withCampaignName(string $campaignName): self
    {
        $self = clone $this;
        $self['campaignName'] = $campaignName;

        return $self;
    }

    /**
     * Identifier assigned to the campaign provided during the token creation.
     */
    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $self = clone $this;
        $self['emailCampaignID'] = $emailCampaignID;

        return $self;
    }

    /**
     * Maximum number of tokens to return.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
