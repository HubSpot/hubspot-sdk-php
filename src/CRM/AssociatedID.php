<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api]
    public string $id;

    /**
     * The type of association.
     */
    #[Api]
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
        $obj = new self;

        $obj->id = $id;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The ID for the association type.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The type of association.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
