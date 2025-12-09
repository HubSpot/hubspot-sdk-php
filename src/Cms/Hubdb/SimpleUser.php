<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimpleUserShape = array{
 *   id: string, email: string, firstName: string, lastName: string
 * }
 */
final class SimpleUser implements BaseModel
{
    /** @use SdkModel<SimpleUserShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $email;

    #[Required]
    public string $firstName;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }
}
