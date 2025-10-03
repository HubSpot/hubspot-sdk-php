<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_emails_public_email_to_details = array{
 *   contactIDs?: MarketingEmailsPublicEmailRecipients,
 *   contactIlsLists?: MarketingEmailsPublicEmailRecipients,
 *   contactLists?: MarketingEmailsPublicEmailRecipients,
 *   limitSendFrequency?: bool,
 *   suppressGraymail?: bool,
 * }
 */
final class MarketingEmailsPublicEmailToDetails implements BaseModel
{
    /** @use SdkModel<marketing_emails_public_email_to_details> */
    use SdkModel;

    #[Api('contactIds', optional: true)]
    public ?MarketingEmailsPublicEmailRecipients $contactIDs;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailRecipients $contactIlsLists;

    #[Api(optional: true)]
    public ?MarketingEmailsPublicEmailRecipients $contactLists;

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
        ?MarketingEmailsPublicEmailRecipients $contactIDs = null,
        ?MarketingEmailsPublicEmailRecipients $contactIlsLists = null,
        ?MarketingEmailsPublicEmailRecipients $contactLists = null,
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

    public function withContactIDs(
        MarketingEmailsPublicEmailRecipients $contactIDs
    ): self {
        $obj = clone $this;
        $obj->contactIDs = $contactIDs;

        return $obj;
    }

    public function withContactIlsLists(
        MarketingEmailsPublicEmailRecipients $contactIlsLists
    ): self {
        $obj = clone $this;
        $obj->contactIlsLists = $contactIlsLists;

        return $obj;
    }

    public function withContactLists(
        MarketingEmailsPublicEmailRecipients $contactLists
    ): self {
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
