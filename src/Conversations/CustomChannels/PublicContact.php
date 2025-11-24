<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicContact\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicContactShape = array{
 *   contactProfile: ContactProfile, type: value-of<Type>
 * }
 */
final class PublicContact implements BaseModel
{
    /** @use SdkModel<PublicContactShape> */
    use SdkModel;

    #[Api]
    public ContactProfile $contactProfile;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ContactProfile $contactProfile,
        Type|string $type = 'CONTACT'
    ): self {
        $obj = new self;

        $obj->contactProfile = $contactProfile;
        $obj['type'] = $type;

        return $obj;
    }

    public function withContactProfile(ContactProfile $contactProfile): self
    {
        $obj = clone $this;
        $obj->contactProfile = $contactProfile;

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
