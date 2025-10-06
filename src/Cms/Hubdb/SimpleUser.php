<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type simple_user = array{
 *   id: string, email: string, firstName: string, lastName: string
 * }
 */
final class SimpleUser implements BaseModel
{
    /** @use SdkModel<simple_user> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public string $email;

    #[Api]
    public string $firstName;

    #[Api]
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
        $obj = new self;

        $obj->id = $id;
        $obj->email = $email;
        $obj->firstName = $firstName;
        $obj->lastName = $lastName;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }
}
