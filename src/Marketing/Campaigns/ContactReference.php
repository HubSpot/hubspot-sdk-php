<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactReferenceShape = array{id: string}
 */
final class ContactReference implements BaseModel
{
    /** @use SdkModel<ContactReferenceShape> */
    use SdkModel;

    /**
     * Unique identifier for the contact.
     */
    #[Required]
    public string $id;

    /**
     * `new ContactReference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactReference::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactReference)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    /**
     * Unique identifier for the contact.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
