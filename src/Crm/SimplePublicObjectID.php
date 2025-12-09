<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimplePublicObjectIDShape = array{id: string}
 */
final class SimplePublicObjectID implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectIDShape> */
    use SdkModel;

    /**
     * Object ID.
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
     * Object ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
