<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Contains the Id of a Public Object.
 *
 * @phpstan-type SimplePublicObjectIDShape = array{id: string}
 */
final class SimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectIDShape> */
    use SdkModel;

    /**
     * The unique ID of the object.
     */
    #[Required]
    public string $id;

    /**
     * `new SimplePublicObjectID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectID::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectID)->withID(...)
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
     * The unique ID of the object.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
