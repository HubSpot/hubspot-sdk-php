<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\ContactAddress;
use HubspotSDK\Conversations\ContactEmail;
use HubspotSDK\Conversations\ContactName;
use HubspotSDK\Conversations\ContactOrg;
use HubspotSDK\Conversations\ContactPhone;
use HubspotSDK\Conversations\ContactProfile;
use HubspotSDK\Conversations\ContactURL;
use HubspotSDK\Conversations\CustomChannels\ContactAttachment\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactAttachmentShape = array{
 *   contactProfile: ContactProfile, type: value-of<Type>
 * }
 */
final class ContactAttachment implements BaseModel
{
    /** @use SdkModel<ContactAttachmentShape> */
    use SdkModel;

    #[Required]
    public ContactProfile $contactProfile;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new ContactAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactAttachment::with(contactProfile: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactAttachment)->withContactProfile(...)->withType(...)
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
     *
     * @param ContactProfile|array{
     *   addresses: list<ContactAddress>,
     *   emails: list<ContactEmail>,
     *   phones: list<ContactPhone>,
     *   urls: list<ContactURL>,
     *   name?: ContactName|null,
     *   org?: ContactOrg|null,
     * } $contactProfile
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ContactProfile|array $contactProfile,
        Type|string $type = 'CONTACT'
    ): self {
        $obj = new self;

        $obj['contactProfile'] = $contactProfile;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param ContactProfile|array{
     *   addresses: list<ContactAddress>,
     *   emails: list<ContactEmail>,
     *   phones: list<ContactPhone>,
     *   urls: list<ContactURL>,
     *   name?: ContactName|null,
     *   org?: ContactOrg|null,
     * } $contactProfile
     */
    public function withContactProfile(
        ContactProfile|array $contactProfile
    ): self {
        $obj = clone $this;
        $obj['contactProfile'] = $contactProfile;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
