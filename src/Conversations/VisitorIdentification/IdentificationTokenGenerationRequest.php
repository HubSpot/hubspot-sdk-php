<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\VisitorIdentification;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Information used to generate a token.
 *
 * @phpstan-type IdentificationTokenGenerationRequestShape = array{
 *   email: string, firstName?: string|null, lastName?: string|null
 * }
 */
final class IdentificationTokenGenerationRequest implements BaseModel
{
    /** @use SdkModel<IdentificationTokenGenerationRequestShape> */
    use SdkModel;

    /**
     * The email of the visitor that you wish to identify.
     */
    #[Api]
    public string $email;

    /**
     * The first name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where first name is unknown. Optional.
     */
    #[Api(optional: true)]
    public ?string $firstName;

    /**
     * The last name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where last name is unknown. Optional.
     */
    #[Api(optional: true)]
    public ?string $lastName;

    /**
     * `new IdentificationTokenGenerationRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IdentificationTokenGenerationRequest::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IdentificationTokenGenerationRequest)->withEmail(...)
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
        string $email,
        ?string $firstName = null,
        ?string $lastName = null
    ): self {
        $obj = new self;

        $obj->email = $email;

        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;

        return $obj;
    }

    /**
     * The email of the visitor that you wish to identify.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * The first name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where first name is unknown. Optional.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj->firstName = $firstName;

        return $obj;
    }

    /**
     * The last name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where last name is unknown. Optional.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj->lastName = $lastName;

        return $obj;
    }
}
