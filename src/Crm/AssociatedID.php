<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Contains the id and type of an association.
 *
 * @phpstan-type AssociatedIDShape = array{id: string, type: string}
 */
final class AssociatedID implements BaseModel
{
    /** @use SdkModel<AssociatedIDShape> */
    use SdkModel;

    /**
     * The ID for the association type.
     */
    #[Required]
    public string $id;

    /**
     * The type of association.
     */
    #[Required]
    public string $type;

    /**
     * `new AssociatedID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociatedID::with(id: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociatedID)->withID(...)->withType(...)
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
    public static function with(string $id, string $type): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The ID for the association type.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The type of association.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
