<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels;

use HubSpotSDK\Conversations\CustomChannels\ContactAttachment\Type;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ContactProfileShape from \HubSpotSDK\Conversations\CustomChannels\ContactProfile
 *
 * @phpstan-type ContactAttachmentShape = array{
 *   contactProfile: ContactProfile|ContactProfileShape, type: Type|value-of<Type>
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
     * @param ContactProfile|ContactProfileShape $contactProfile
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ContactProfile|array $contactProfile,
        Type|string $type = 'CONTACT'
    ): self {
        $self = new self;

        $self['contactProfile'] = $contactProfile;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param ContactProfile|ContactProfileShape $contactProfile
     */
    public function withContactProfile(
        ContactProfile|array $contactProfile
    ): self {
        $self = clone $this;
        $self['contactProfile'] = $contactProfile;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
