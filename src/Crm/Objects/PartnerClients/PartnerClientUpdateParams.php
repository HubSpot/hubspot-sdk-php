<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerClients;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Crm\Objects\PartnerClients->update
 *
 * @phpstan-type PartnerClientUpdateParamsShape = array{
 *   properties: array<string, string>, idProperty?: string
 * }
 */
final class PartnerClientUpdateParams implements BaseModel
{
    /** @use SdkModel<PartnerClientUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string, string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new PartnerClientUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PartnerClientUpdateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PartnerClientUpdateParams)->withProperties(...)
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
     * @param array<string, string> $properties
     */
    public static function with(
        array $properties,
        ?string $idProperty = null
    ): self {
        $obj = new self;

        $obj->properties = $properties;

        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * Key value pairs representing the properties of the object.
     *
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
