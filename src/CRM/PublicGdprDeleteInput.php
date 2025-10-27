<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_gdpr_delete_input = array{
 *   objectID: string, idProperty?: string
 * }
 */
final class PublicGdprDeleteInput implements BaseModel
{
    /** @use SdkModel<public_gdpr_delete_input> */
    use SdkModel;

    #[Api('objectId')]
    public string $objectID;

    /**
     * The name of a property whose values are unique for this object.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->objectID = $objectID;

        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    /**
     * The name of a property whose values are unique for this object.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
