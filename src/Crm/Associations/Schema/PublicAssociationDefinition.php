<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAssociationDefinitionShape = array{id: string, name: string}
 */
final class PublicAssociationDefinition implements BaseModel
{
    /** @use SdkModel<PublicAssociationDefinitionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $name;

    /**
     * `new PublicAssociationDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationDefinition::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationDefinition)->withID(...)->withName(...)
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
    public static function with(string $id, string $name): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
