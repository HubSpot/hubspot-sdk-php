<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicContact\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ContactProfileShape from \HubspotSDK\Conversations\ContactProfile
 *
 * @phpstan-type PublicContactShape = array{
 *   contactProfile: ContactProfile|ContactProfileShape, type: Type|value-of<Type>
 * }
 */
final class PublicContact implements BaseModel
{
    /** @use SdkModel<PublicContactShape> */
    use SdkModel;

    #[Required]
    public ContactProfile $contactProfile;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PublicContact()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicContact::with(contactProfile: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicContact)->withContactProfile(...)->withType(...)
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
     * @param ContactProfileShape $contactProfile
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
     * @param ContactProfileShape $contactProfile
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
