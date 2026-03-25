<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\VisitorIdentification;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint generates an identification token for a website visitor who has been authenticated using your own system. An identification token returned from this API can be used to pass information about your already-authenticated visitor to the chat widget, so that it treats the visitor as a known contact. This allows support agents to recognize and assist the visitor more effectively.
 *
 * @see HubspotSDK\Services\Conversations\VisitorIdentificationService::generateToken()
 *
 * @phpstan-type VisitorIdentificationGenerateTokenParamsShape = array{
 *   email: string, firstName?: string|null, lastName?: string|null
 * }
 */
final class VisitorIdentificationGenerateTokenParams implements BaseModel
{
    /** @use SdkModel<VisitorIdentificationGenerateTokenParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new VisitorIdentificationGenerateTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VisitorIdentificationGenerateTokenParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VisitorIdentificationGenerateTokenParams)->withEmail(...)
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
