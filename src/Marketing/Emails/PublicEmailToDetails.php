<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Data structure representing the to fields of the email.
 *
 * @phpstan-type PublicEmailToDetailsShape = array{
 *   contactIDs?: PublicEmailRecipients|null,
 *   contactIlsLists?: PublicEmailRecipients|null,
 *   contactLists?: PublicEmailRecipients|null,
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
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactIDs
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactIlsLists
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactLists
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
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactIDs
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
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactIlsLists
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
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactLists
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
