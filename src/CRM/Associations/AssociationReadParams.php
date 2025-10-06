<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\PublicObjectID;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AssociationReadParams); // set properties as needed
 * $client->crm.associations->read(...$params->toArray());
 * ```
 * Read a batch of associations.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.associations->read(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Associations->read
 *
 * @phpstan-type association_read_params = array{
 *   fromObjectType: string, inputs: list<PublicObjectID>
 * }
 */
final class AssociationReadParams implements BaseModel
{
    /** @use SdkModel<association_read_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicObjectID> $inputs */
    #[Api(list: PublicObjectID::class)]
    public array $inputs;

    /**
     * `new AssociationReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationReadParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationReadParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicObjectID> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    /**
     * @param list<PublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
