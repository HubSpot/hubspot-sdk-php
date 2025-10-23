<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A SMTP API token provides both an ID and password that can be used to send email through the HubSpot SMTP API.
 *
 * @phpstan-type smtp_api_token_view = array{
 *   id: string,
 *   campaignName: string,
 *   createContact: bool,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   emailCampaignID: string,
 *   password?: string,
 * }
 */
final class SmtpAPITokenView implements BaseModel
{
    /** @use SdkModel<smtp_api_token_view> */
    use SdkModel;

    /**
     * User name to log into the HubSpot SMTP server.
     */
    #[Api]
    public string $id;

    /**
     * A name for the campaign tied to the token.
     */
    #[Api]
    public string $campaignName;

    /**
     * Indicates whether a contact should be created for email recipients.
     */
    #[Api]
    public bool $createContact;

    /**
     * Timestamp generated when a token is created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Email address of the user that sent the token creation request.
     */
    #[Api]
    public string $createdBy;

    /**
     * Identifier assigned to the campaign provided in the token creation request.
     */
    #[Api('emailCampaignId')]
    public string $emailCampaignID;

    /**
     * Password used to log into the HubSpot SMTP server.
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * `new SmtpAPITokenView()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SmtpAPITokenView::with(
     *   id: ...,
     *   campaignName: ...,
     *   createContact: ...,
     *   createdAt: ...,
     *   createdBy: ...,
     *   emailCampaignID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SmtpAPITokenView)
     *   ->withID(...)
     *   ->withCampaignName(...)
     *   ->withCreateContact(...)
     *   ->withCreatedAt(...)
     *   ->withCreatedBy(...)
     *   ->withEmailCampaignID(...)
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
        string $id,
        string $campaignName,
        bool $createContact,
        \DateTimeInterface $createdAt,
        string $createdBy,
        string $emailCampaignID,
        ?string $password = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->campaignName = $campaignName;
        $obj->createContact = $createContact;
        $obj->createdAt = $createdAt;
        $obj->createdBy = $createdBy;
        $obj->emailCampaignID = $emailCampaignID;

        null !== $password && $obj->password = $password;

        return $obj;
    }

    /**
     * User name to log into the HubSpot SMTP server.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A name for the campaign tied to the token.
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

    /**
     * Timestamp generated when a token is created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Email address of the user that sent the token creation request.
     */
    public function withCreatedBy(string $createdBy): self
    {
        $obj = clone $this;
        $obj->createdBy = $createdBy;

        return $obj;
    }

    /**
     * Identifier assigned to the campaign provided in the token creation request.
     */
    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $obj = clone $this;
        $obj->emailCampaignID = $emailCampaignID;

        return $obj;
    }

    /**
     * Password used to log into the HubSpot SMTP server.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }
}
