<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMAssociationSpec;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new V4CreateParams); // set properties as needed
 * $client->crm.associations.v4->create(...$params->toArray());
 * ```
 * Create.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.associations.v4->create(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Associations\V4->create
 *
 * @phpstan-type v4_create_params = array{
 *   objectType: string,
 *   objectID: string,
 *   toObjectType: string,
 *   body: list<CRMAssociationSpec>,
 * }
 */
final class V4CreateParams implements BaseModel
{
    /** @use SdkModel<v4_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $objectID;

    #[Api]
    public string $toObjectType;

    /** @var list<CRMAssociationSpec> $body */
    #[Api(list: CRMAssociationSpec::class)]
    public array $body;

    /**
     * `new V4CreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V4CreateParams::with(
     *   objectType: ..., objectID: ..., toObjectType: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V4CreateParams)
     *   ->withObjectType(...)
     *   ->withObjectID(...)
     *   ->withToObjectType(...)
     *   ->withBody(...)
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
     * @param list<CRMAssociationSpec> $body
     */
    public static function with(
        string $objectType,
        string $objectID,
        string $toObjectType,
        array $body
    ): self {
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->objectID = $objectID;
        $obj->toObjectType = $toObjectType;
        $obj->body = $body;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    /**
     * @param list<CRMAssociationSpec> $body
     */
    public function withBody(array $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
