<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicGdprDeleteInputShape = array{
 *   objectId: string, idProperty?: string|null
 * }
 */
final class PublicGdprDeleteInput implements BaseModel
{
    /** @use SdkModel<PublicGdprDeleteInputShape> */
    use SdkModel;

    /**
     * ID of the object.
     */
    #[Api]
    public string $objectId;

    /**
     * ID property.
     */
    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new PublicGdprDeleteInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicGdprDeleteInput::with(objectId: ...)
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
        string $objectId,
        ?string $idProperty = null
    ): self {
        $obj = new self;

        $obj->objectId = $objectId;

        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * ID of the object.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectId = $objectID;

        return $obj;
    }

    /**
     * ID property.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
