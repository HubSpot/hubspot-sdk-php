<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A request object to create a SMTP API token.
 *
 * @phpstan-type SmtpAPITokenRequestEggShape = array{
 *   campaignName: string, createContact: bool
 * }
 */
final class SmtpAPITokenRequestEgg implements BaseModel
{
    /** @use SdkModel<SmtpAPITokenRequestEggShape> */
    use SdkModel;

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
     * `new SmtpAPITokenRequestEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SmtpAPITokenRequestEgg::with(campaignName: ..., createContact: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SmtpAPITokenRequestEgg)->withCampaignName(...)->withCreateContact(...)
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

        $obj['campaignName'] = $campaignName;
        $obj['createContact'] = $createContact;

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
     * Indicates whether a contact should be created for email recipients.
     */
    public function withCreateContact(bool $createContact): self
    {
        $obj = clone $this;
        $obj['createContact'] = $createContact;

        return $obj;
    }
}
