<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\VersionUser;

/**
 * @phpstan-import-type PublicEmailShape from \HubSpotSDK\Marketing\Emails\PublicEmail
 * @phpstan-import-type VersionUserShape from \HubSpotSDK\VersionUser
 *
 * @phpstan-type VersionPublicEmailShape = array{
 *   id: string,
 *   object: PublicEmail|PublicEmailShape,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser|VersionUserShape,
 * }
 */
final class VersionPublicEmail implements BaseModel
{
    /** @use SdkModel<VersionPublicEmailShape> */
    use SdkModel;

    /**
     * ID of this marketing email version.
     */
    #[Required]
    public string $id;

    #[Required]
    public PublicEmail $object;

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required]
    public VersionUser $user;

    /**
     * `new VersionPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionPublicEmail::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionPublicEmail)
     *   ->withID(...)
     *   ->withObject(...)
     *   ->withUpdatedAt(...)
     *   ->withUser(...)
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
     * @param PublicEmail|PublicEmailShape $object
     * @param VersionUser|VersionUserShape $user
     */
    public static function with(
        string $id,
        PublicEmail|array $object,
        \DateTimeInterface $updatedAt,
        VersionUser|array $user,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['object'] = $object;
        $self['updatedAt'] = $updatedAt;
        $self['user'] = $user;

        return $self;
    }

    /**
     * ID of this marketing email version.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param PublicEmail|PublicEmailShape $object
     */
    public function withObject(PublicEmail|array $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param VersionUser|VersionUserShape $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
