<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\VisitorIdentification;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
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
    #[Required]
    public string $email;

    /**
     * The first name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where first name is unknown. Optional.
     */
    #[Optional]
    public ?string $firstName;

    /**
     * The last name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where last name is unknown. Optional.
     */
    #[Optional]
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
        $self = new self;

        $self['email'] = $email;

        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * The email of the visitor that you wish to identify.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The first name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where first name is unknown. Optional.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The last name of the visitor that you wish to identify. This value will only be set in HubSpot for new contacts and existing contacts where last name is unknown. Optional.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }
}
