<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SmtpAPITokenViewShape = array{
 *   id: string,
 *   campaignName: string,
 *   createContact: bool,
 *   createdAt: \DateTimeInterface,
 *   createdBy: string,
 *   emailCampaignID: string,
 *   password?: string|null,
 * }
 */
final class SmtpAPITokenView implements BaseModel
{
    /** @use SdkModel<SmtpAPITokenViewShape> */
    use SdkModel;

    /**
     * User name to log into the HubSpot SMTP server.
     */
    #[Required]
    public string $id;

    /**
     * A name for the campaign tied to the token.
     */
    #[Required]
    public string $campaignName;

    /**
     * Indicates whether a contact should be created for email recipients.
     */
    #[Required]
    public bool $createContact;

    /**
     * Timestamp generated when a token is created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Email address of the user that sent the token creation request.
     */
    #[Required]
    public string $createdBy;

    /**
     * Identifier assigned to the campaign provided in the token creation request.
     */
    #[Required('emailCampaignId')]
    public string $emailCampaignID;

    /**
     * Password used to log into the HubSpot SMTP server.
     */
    #[Optional]
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
        $self = new self;

        $self['id'] = $id;
        $self['campaignName'] = $campaignName;
        $self['createContact'] = $createContact;
        $self['createdAt'] = $createdAt;
        $self['createdBy'] = $createdBy;
        $self['emailCampaignID'] = $emailCampaignID;

        null !== $password && $self['password'] = $password;

        return $self;
    }

    /**
     * User name to log into the HubSpot SMTP server.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A name for the campaign tied to the token.
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

    /**
     * Timestamp generated when a token is created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Email address of the user that sent the token creation request.
     */
    public function withCreatedBy(string $createdBy): self
    {
        $self = clone $this;
        $self['createdBy'] = $createdBy;

        return $self;
    }

    /**
     * Identifier assigned to the campaign provided in the token creation request.
     */
    public function withEmailCampaignID(string $emailCampaignID): self
    {
        $self = clone $this;
        $self['emailCampaignID'] = $emailCampaignID;

        return $self;
    }

    /**
     * Password used to log into the HubSpot SMTP server.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }
}
