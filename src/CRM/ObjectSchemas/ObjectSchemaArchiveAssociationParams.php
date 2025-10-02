<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\ObjectSchemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ObjectSchemaArchiveAssociationParams); // set properties as needed
 * $client->crm.objectSchemas->archiveAssociation(...$params->toArray());
 * ```
 * Remove an association.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objectSchemas->archiveAssociation(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\ObjectSchemas->archiveAssociation
 *
 * @phpstan-type object_schema_archive_association_params = array{
 *   objectType: string
 * }
 */
final class ObjectSchemaArchiveAssociationParams implements BaseModel
{
    /** @use SdkModel<object_schema_archive_association_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * `new ObjectSchemaArchiveAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchemaArchiveAssociationParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectSchemaArchiveAssociationParams)->withObjectType(...)
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
    public static function with(string $objectType): self
    {
        $obj = new self;

        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
