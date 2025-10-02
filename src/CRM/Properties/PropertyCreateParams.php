<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PropertyCreateParams); // set properties as needed
 * $client->crm.properties->create(...$params->toArray());
 * ```
 * Create a property group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.properties->create(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Properties->create
 *
 * @phpstan-type property_create_params = array{
 *   label: string, name: string, displayOrder?: int
 * }
 */
final class PropertyCreateParams implements BaseModel
{
    /** @use SdkModel<property_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * `new PropertyCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyCreateParams::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyCreateParams)->withLabel(...)->withName(...)
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
        string $label,
        string $name,
        ?int $displayOrder = null
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->name = $name;

        null !== $displayOrder && $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }
}
