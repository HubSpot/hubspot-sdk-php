<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SchemaArchiveAssociationParams); // set properties as needed
 * $client->crm.objects.schemas->archiveAssociation(...$params->toArray());
 * ```
 * Remove an association.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.schemas->archiveAssociation(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Schemas->archiveAssociation
 *
 * @phpstan-type schema_archive_association_params = array{objectType: string}
 */
final class SchemaArchiveAssociationParams implements BaseModel
{
    /** @use SdkModel<schema_archive_association_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * `new SchemaArchiveAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaArchiveAssociationParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaArchiveAssociationParams)->withObjectType(...)
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
