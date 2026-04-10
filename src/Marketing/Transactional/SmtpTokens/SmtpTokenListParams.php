<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Transactional\SmtpTokens;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Query multiple SMTP API tokens by campaign name or a single token by emailCampaignId.
 *
 * @see HubSpotSDK\Services\Marketing\Transactional\SmtpTokensService::list()
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
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $campaignName;

    #[Optional]
    public ?string $emailCampaignID;

    /**
     * The maximum number of results to display per page.
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
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withCampaignName(string $campaignName): self
    {
        $self = clone $this;
        $self['campaignName'] = $campaignName;

        return $self;
    }

    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $self = clone $this;
        $self['emailCampaignID'] = $emailCampaignID;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
