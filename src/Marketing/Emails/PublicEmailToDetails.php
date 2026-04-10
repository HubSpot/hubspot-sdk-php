<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicEmailRecipientsShape from \HubSpotSDK\Marketing\Emails\PublicEmailRecipients
 *
 * @phpstan-type PublicEmailToDetailsShape = array{
 *   contactIDs?: null|PublicEmailRecipients|PublicEmailRecipientsShape,
 *   contactIlsLists?: null|PublicEmailRecipients|PublicEmailRecipientsShape,
 *   contactLists?: null|PublicEmailRecipients|PublicEmailRecipientsShape,
 *   limitSendFrequency?: bool|null,
 *   suppressGraymail?: bool|null,
 * }
 */
final class PublicEmailToDetails implements BaseModel
{
    /** @use SdkModel<PublicEmailToDetailsShape> */
    use SdkModel;

    #[Optional('contactIds')]
    public ?PublicEmailRecipients $contactIDs;

    #[Optional]
    public ?PublicEmailRecipients $contactIlsLists;

    #[Optional]
    public ?PublicEmailRecipients $contactLists;

    #[Optional]
    public ?bool $limitSendFrequency;

    /**
     * Whether to send to unengaged contacts (false) or not (true).
     */
    #[Optional]
    public ?bool $suppressGraymail;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PublicEmailRecipients|PublicEmailRecipientsShape|null $contactIDs
     * @param PublicEmailRecipients|PublicEmailRecipientsShape|null $contactIlsLists
     * @param PublicEmailRecipients|PublicEmailRecipientsShape|null $contactLists
     */
    public static function with(
        PublicEmailRecipients|array|null $contactIDs = null,
        PublicEmailRecipients|array|null $contactIlsLists = null,
        PublicEmailRecipients|array|null $contactLists = null,
        ?bool $limitSendFrequency = null,
        ?bool $suppressGraymail = null,
    ): self {
        $self = new self;

        null !== $contactIDs && $self['contactIDs'] = $contactIDs;
        null !== $contactIlsLists && $self['contactIlsLists'] = $contactIlsLists;
        null !== $contactLists && $self['contactLists'] = $contactLists;
        null !== $limitSendFrequency && $self['limitSendFrequency'] = $limitSendFrequency;
        null !== $suppressGraymail && $self['suppressGraymail'] = $suppressGraymail;

        return $self;
    }

    /**
     * @param PublicEmailRecipients|PublicEmailRecipientsShape $contactIDs
     */
    public function withContactIDs(
        PublicEmailRecipients|array $contactIDs
    ): self {
        $self = clone $this;
        $self['contactIDs'] = $contactIDs;

        return $self;
    }

    /**
     * @param PublicEmailRecipients|PublicEmailRecipientsShape $contactIlsLists
     */
    public function withContactIlsLists(
        PublicEmailRecipients|array $contactIlsLists
    ): self {
        $self = clone $this;
        $self['contactIlsLists'] = $contactIlsLists;

        return $self;
    }

    /**
     * @param PublicEmailRecipients|PublicEmailRecipientsShape $contactLists
     */
    public function withContactLists(
        PublicEmailRecipients|array $contactLists
    ): self {
        $self = clone $this;
        $self['contactLists'] = $contactLists;

        return $self;
    }

    public function withLimitSendFrequency(bool $limitSendFrequency): self
    {
        $self = clone $this;
        $self['limitSendFrequency'] = $limitSendFrequency;

        return $self;
    }

    /**
     * Whether to send to unengaged contacts (false) or not (true).
     */
    public function withSuppressGraymail(bool $suppressGraymail): self
    {
        $self = clone $this;
        $self['suppressGraymail'] = $suppressGraymail;

        return $self;
    }
}
