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
 *   contactIds?: PublicEmailRecipients|null,
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
    #[Optional]
    public ?PublicEmailRecipients $contactIds;

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
     * } $contactIds
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactIlsLists
     * @param PublicEmailRecipients|array{
     *   exclude?: list<string>|null, include?: list<string>|null
     * } $contactLists
     */
    public static function with(
        PublicEmailRecipients|array|null $contactIds = null,
        PublicEmailRecipients|array|null $contactIlsLists = null,
        PublicEmailRecipients|array|null $contactLists = null,
        ?bool $limitSendFrequency = null,
        ?bool $suppressGraymail = null,
    ): self {
        $obj = new self;

        null !== $contactIds && $obj['contactIds'] = $contactIds;
        null !== $contactIlsLists && $obj['contactIlsLists'] = $contactIlsLists;
        null !== $contactLists && $obj['contactLists'] = $contactLists;
        null !== $limitSendFrequency && $obj['limitSendFrequency'] = $limitSendFrequency;
        null !== $suppressGraymail && $obj['suppressGraymail'] = $suppressGraymail;

        return $obj;
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
        $obj = clone $this;
        $obj['contactIds'] = $contactIDs;

        return $obj;
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
        $obj = clone $this;
        $obj['contactIlsLists'] = $contactIlsLists;

        return $obj;
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
        $obj = clone $this;
        $obj['contactLists'] = $contactLists;

        return $obj;
    }

    public function withLimitSendFrequency(bool $limitSendFrequency): self
    {
        $obj = clone $this;
        $obj['limitSendFrequency'] = $limitSendFrequency;

        return $obj;
    }

    /**
     * Whether to send to unengaged contacts (false) or not (true).
     */
    public function withSuppressGraymail(bool $suppressGraymail): self
    {
        $obj = clone $this;
        $obj['suppressGraymail'] = $suppressGraymail;

        return $obj;
    }
}
