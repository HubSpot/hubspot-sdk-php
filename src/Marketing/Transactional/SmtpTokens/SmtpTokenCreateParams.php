<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional\SmtpTokens;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a SMTP API token.
 *
 * @see HubspotSDK\Services\Marketing\Transactional\SmtpTokensService::create()
 *
 * @phpstan-type SmtpTokenCreateParamsShape = array{
 *   campaignName: string, createContact: bool
 * }
 */
final class SmtpTokenCreateParams implements BaseModel
{
    /** @use SdkModel<SmtpTokenCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A name for the campaign tied to the SMTP API token.
     */
    #[Required]
    public string $campaignName;

    /**
     * Indicates whether a contact should be created for email recipients.
     */
    #[Required]
    public bool $createContact;

    /**
     * `new SmtpTokenCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SmtpTokenCreateParams::with(campaignName: ..., createContact: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SmtpTokenCreateParams)->withCampaignName(...)->withCreateContact(...)
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
    public static function with(string $campaignName, bool $createContact): self
    {
        $self = new self;

        $self['campaignName'] = $campaignName;
        $self['createContact'] = $createContact;

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
     * Indicates whether a contact should be created for email recipients.
     */
    public function withCreateContact(bool $createContact): self
    {
        $self = clone $this;
        $self['createContact'] = $createContact;

        return $self;
    }
}
