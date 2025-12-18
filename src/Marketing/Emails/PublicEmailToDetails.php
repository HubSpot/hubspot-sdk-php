<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing the to fields of the email.
 *
 * @phpstan-import-type PublicEmailRecipientsShape from \HubspotSDK\Marketing\Emails\PublicEmailRecipients
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

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
    #[Optional('contactIds')]
    public ?PublicEmailRecipients $contactIDs;

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
    #[Optional]
    public ?PublicEmailRecipients $contactIlsLists;

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
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
     * Data structure representing lists of IDs that should be included and excluded.
     *
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
     * Data structure representing lists of IDs that should be included and excluded.
     *
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
     * Data structure representing lists of IDs that should be included and excluded.
     *
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
