<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Contains the Id of a Public Object.
 *
 * @phpstan-type PublicObjectIDShape = array{id: string}
 */
final class PublicObjectID implements BaseModel
{
    /** @use SdkModel<PublicObjectIDShape> */
    use SdkModel;

    /**
     * The unique identifier for the public object.
     */
    #[Required]
    public string $id;

    /**
     * `new PublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectID::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicObjectID)->withID(...)
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
     * The unique identifier for the public object.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
