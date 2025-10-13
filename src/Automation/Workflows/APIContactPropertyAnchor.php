<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIContactPropertyAnchor\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_contact_property_anchor = array{
 *   contactProperty: string, type: value-of<Type>
 * }
 */
final class APIContactPropertyAnchor implements BaseModel
{
    /** @use SdkModel<api_contact_property_anchor> */
    use SdkModel;

    /**
     * A date property on the contact to use as the anchor point of this workflow.
     */
    #[Api]
    public string $contactProperty;

    /**
     * The type of event anchor this is, can be: "CONTACT_PROPERTY_ANCHOR" or "STATIC_DATE_ANCHOR".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIContactPropertyAnchor()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIContactPropertyAnchor::with(contactProperty: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIContactPropertyAnchor)->withContactProperty(...)->withType(...)
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
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $contactProperty,
        Type|string $type = 'CONTACT_PROPERTY_ANCHOR'
    ): self {
        $obj = new self;

        $obj->contactProperty = $contactProperty;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * A date property on the contact to use as the anchor point of this workflow.
     */
    public function withContactProperty(string $contactProperty): self
    {
        $obj = clone $this;
        $obj->contactProperty = $contactProperty;

        return $obj;
    }

    /**
     * The type of event anchor this is, can be: "CONTACT_PROPERTY_ANCHOR" or "STATIC_DATE_ANCHOR".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
