<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional\SmtpTokens;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create a SMTP API token.
 *
 * @see HubspotSDK\Marketing\Transactional\SmtpTokens->create
 *
 * @phpstan-type smtp_token_create_params = array{
 *   campaignName: string, createContact: bool
 * }
 */
final class SmtpTokenCreateParams implements BaseModel
{
    /** @use SdkModel<smtp_token_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A name for the campaign tied to the SMTP API token.
     */
    #[Api]
    public string $campaignName;

    /**
     * Indicates whether a contact should be created for email recipients.
     */
    #[Api]
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
        $obj = new self;

        $obj->campaignName = $campaignName;
        $obj->createContact = $createContact;

        return $obj;
    }

    /**
     * A name for the campaign tied to the SMTP API token.
     */
    public function withCampaignName(string $campaignName): self
    {
        $obj = clone $this;
        $obj->campaignName = $campaignName;

        return $obj;
    }

    /**
     * Indicates whether a contact should be created for email recipients.
     */
    public function withCreateContact(bool $createContact): self
    {
        $obj = clone $this;
        $obj->createContact = $createContact;

        return $obj;
    }
}
