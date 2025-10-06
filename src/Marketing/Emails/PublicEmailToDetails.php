<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_email_to_details = array{
 *   contactIDs?: PublicEmailRecipients,
 *   contactIlsLists?: PublicEmailRecipients,
 *   contactLists?: PublicEmailRecipients,
 *   limitSendFrequency?: bool,
 *   suppressGraymail?: bool,
 * }
 */
final class PublicEmailToDetails implements BaseModel
{
    /** @use SdkModel<public_email_to_details> */
    use SdkModel;

    #[Api('contactIds', optional: true)]
    public ?PublicEmailRecipients $contactIDs;

    #[Api(optional: true)]
    public ?PublicEmailRecipients $contactIlsLists;

    #[Api(optional: true)]
    public ?PublicEmailRecipients $contactLists;

    #[Api(optional: true)]
    public ?bool $limitSendFrequency;

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
        ?PublicEmailRecipients $contactIDs = null,
        ?PublicEmailRecipients $contactIlsLists = null,
        ?PublicEmailRecipients $contactLists = null,
        ?bool $limitSendFrequency = null,
        ?bool $suppressGraymail = null,
    ): self {
        $obj = new self;

        null !== $contactIDs && $obj->contactIDs = $contactIDs;
        null !== $contactIlsLists && $obj->contactIlsLists = $contactIlsLists;
        null !== $contactLists && $obj->contactLists = $contactLists;
        null !== $limitSendFrequency && $obj->limitSendFrequency = $limitSendFrequency;
        null !== $suppressGraymail && $obj->suppressGraymail = $suppressGraymail;

        return $obj;
    }

    public function withContactIDs(PublicEmailRecipients $contactIDs): self
    {
        $obj = clone $this;
        $obj->contactIDs = $contactIDs;

        return $obj;
    }

    public function withContactIlsLists(
        PublicEmailRecipients $contactIlsLists
    ): self {
        $obj = clone $this;
        $obj->contactIlsLists = $contactIlsLists;

        return $obj;
    }

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

    public function withSuppressGraymail(bool $suppressGraymail): self
    {
        $obj = clone $this;
        $obj->suppressGraymail = $suppressGraymail;

        return $obj;
    }
}
