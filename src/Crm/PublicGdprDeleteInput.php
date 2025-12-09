<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicGdprDeleteInputShape = array{
 *   objectID: string, idProperty?: string|null
 * }
 */
final class PublicGdprDeleteInput implements BaseModel
{
    /** @use SdkModel<PublicGdprDeleteInputShape> */
    use SdkModel;

    /**
     * ID of the object.
     */
    #[Required('objectId')]
    public string $objectID;

    /**
     * ID property.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * `new PublicGdprDeleteInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicGdprDeleteInput::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicGdprDeleteInput)->withObjectID(...)
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
        string $objectID,
        ?string $idProperty = null
    ): self {
        $self = new self;

        $self['objectID'] = $objectID;

        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    /**
     * ID of the object.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * ID property.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
