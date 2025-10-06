<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AssociationDeleteParams); // set properties as needed
 * $client->crm.associations->delete(...$params->toArray());
 * ```
 * Archive a batch of associations.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.associations->delete(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Associations->delete
 *
 * @phpstan-type association_delete_params = array{
 *   fromObjectType: string, inputs: list<PublicAssociation>
 * }
 */
final class AssociationDeleteParams implements BaseModel
{
    /** @use SdkModel<association_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicAssociation> $inputs */
    #[Api(list: PublicAssociation::class)]
    public array $inputs;

    /**
     * `new AssociationDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDeleteParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociation> $inputs
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
     * @param list<PublicAssociation> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
