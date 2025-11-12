<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?PublicEmailRecipients $contactIds;

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
    #[Api(optional: true)]
    public ?PublicEmailRecipients $contactIlsLists;

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
    #[Api(optional: true)]
    public ?PublicEmailRecipients $contactLists;

    #[Api(optional: true)]
    public ?bool $limitSendFrequency;

    /**
     * Whether to send to unengaged contacts (false) or not (true).
     */
    #[Api(optional: true)]
    public ?bool $suppressGraymail;

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
        ?PublicEmailRecipients $contactIds = null,
        ?PublicEmailRecipients $contactIlsLists = null,
        ?PublicEmailRecipients $contactLists = null,
        ?bool $limitSendFrequency = null,
        ?bool $suppressGraymail = null,
    ): self {
        $obj = new self;

        null !== $contactIds && $obj->contactIds = $contactIds;
        null !== $contactIlsLists && $obj->contactIlsLists = $contactIlsLists;
        null !== $contactLists && $obj->contactLists = $contactLists;
        null !== $limitSendFrequency && $obj->limitSendFrequency = $limitSendFrequency;
        null !== $suppressGraymail && $obj->suppressGraymail = $suppressGraymail;

        return $obj;
    }

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
    public function withContactIDs(PublicEmailRecipients $contactIDs): self
    {
        $obj = clone $this;
        $obj->contactIds = $contactIDs;

        return $obj;
    }

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
    public function withContactIlsLists(
        PublicEmailRecipients $contactIlsLists
    ): self {
        $obj = clone $this;
        $obj->contactIlsLists = $contactIlsLists;

        return $obj;
    }

    /**
     * Data structure representing lists of IDs that should be included and excluded.
     */
    public function withContactLists(PublicEmailRecipients $contactLists): self
    {
        $obj = clone $this;
        $obj->contactLists = $contactLists;

        return $obj;
    }

    public function withLimitSendFrequency(bool $limitSendFrequency): self
    {
        $obj = clone $this;
        $obj->limitSendFrequency = $limitSendFrequency;

        return $obj;
    }

    /**
     * Whether to send to unengaged contacts (false) or not (true).
     */
    public function withSuppressGraymail(bool $suppressGraymail): self
    {
        $obj = clone $this;
        $obj->suppressGraymail = $suppressGraymail;

        return $obj;
    }
}
