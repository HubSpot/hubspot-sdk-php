<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailCloneRequestVNextShape = array{
 *   id: string, cloneName?: string|null, language?: string|null
 * }
 */
final class EmailCloneRequestVNext implements BaseModel
{
    /** @use SdkModel<EmailCloneRequestVNextShape> */
    use SdkModel;

    /**
     * The email ID.
     */
    #[Required]
    public string $id;

    /**
     * The name to assign to the cloned email.
     */
    #[Optional]
    public ?string $cloneName;

    /**
     * The language code for the cloned email, such as 'en' for English.
     */
    #[Optional]
    public ?string $language;

    /**
     * `new EmailCloneRequestVNext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailCloneRequestVNext::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailCloneRequestVNext)->withID(...)
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
        ?string $cloneName = null,
        ?string $language = null
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $cloneName && $self['cloneName'] = $cloneName;
        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * The email ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The name to assign to the cloned email.
     */
    public function withCloneName(string $cloneName): self
    {
        $self = clone $this;
        $self['cloneName'] = $cloneName;

        return $self;
    }

    /**
     * The language code for the cloned email, such as 'en' for English.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
