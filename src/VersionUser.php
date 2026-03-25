<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type VersionUserShape = array{
 *   id: string, email: string, fullName: string
 * }
 */
final class VersionUser implements BaseModel
{
    /** @use SdkModel<VersionUserShape> */
    use SdkModel;

    /**
     * The unique ID of the User.
     */
    #[Required]
    public string $id;

    /**
     * The email address of the user.
     */
    #[Required]
    public string $email;

    /**
     * The first and last name of the User.
     */
    #[Required]
    public string $fullName;

    /**
     * `new VersionUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionUser::with(id: ..., email: ..., fullName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionUser)->withID(...)->withEmail(...)->withFullName(...)
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
     */
    public static function with(
        string $id,
        string $email,
        string $fullName
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['email'] = $email;
        $self['fullName'] = $fullName;

        return $self;
    }

    /**
     * The unique ID of the User.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The email address of the user.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The first and last name of the User.
     */
    public function withFullName(string $fullName): self
    {
        $self = clone $this;
        $self['fullName'] = $fullName;

        return $self;
    }
}
