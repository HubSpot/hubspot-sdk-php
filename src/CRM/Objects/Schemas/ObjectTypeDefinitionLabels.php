<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Singular and plural labels for the object. Used in CRM display.
 *
 * @phpstan-type object_type_definition_labels = array{
 *   plural?: string, singular?: string
 * }
 */
final class ObjectTypeDefinitionLabels implements BaseModel
{
    /** @use SdkModel<object_type_definition_labels> */
    use SdkModel;

    /**
     * The word for multiple objects. (There’s no way to change this later.).
     */
    #[Api(optional: true)]
    public ?string $plural;

    /**
     * The word for one object. (There’s no way to change this later.).
     */
    #[Api(optional: true)]
    public ?string $singular;

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
        ?string $plural = null,
        ?string $singular = null
    ): self {
        $obj = new self;

        null !== $plural && $obj->plural = $plural;
        null !== $singular && $obj->singular = $singular;

        return $obj;
    }

    /**
     * The word for multiple objects. (There’s no way to change this later.).
     */
    public function withPlural(string $plural): self
    {
        $obj = clone $this;
        $obj->plural = $plural;

        return $obj;
    }

    /**
     * The word for one object. (There’s no way to change this later.).
     */
    public function withSingular(string $singular): self
    {
        $obj = clone $this;
        $obj->singular = $singular;

        return $obj;
    }
}
