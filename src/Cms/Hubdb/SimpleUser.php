<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimpleUserShape = array{
 *   id: string, email: string, firstName: string, lastName: string
 * }
 */
final class SimpleUser implements BaseModel
{
    /** @use SdkModel<SimpleUserShape> */
    use SdkModel;

    /**
     * The unique identifier for the user.
     */
    #[Required]
    public string $id;

    /**
     * The email address of the user.
     */
    #[Required]
    public string $email;

    /**
     * The first name of the user.
     */
    #[Required]
    public string $firstName;

    /**
     * The last name of the user.
     */
    #[Required]
    public string $lastName;

    /**
     * `new SimpleUser()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimpleUser::with(id: ..., email: ..., firstName: ..., lastName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimpleUser)
     *   ->withID(...)
     *   ->withEmail(...)
     *   ->withFirstName(...)
     *   ->withLastName(...)
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
        string $firstName,
        string $lastName
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['email'] = $email;
        $self['firstName'] = $firstName;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * The unique identifier for the user.
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
     * The first name of the user.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The last name of the user.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }
}
