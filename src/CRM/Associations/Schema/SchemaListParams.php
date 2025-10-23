<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * List all the valid association types available between two object types.
 *
 * @see HubspotSDK\CRM\Associations\Schema->list
 *
 * @phpstan-type schema_list_params = array{fromObjectType: string}
 */
final class SchemaListParams implements BaseModel
{
    /** @use SdkModel<schema_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /**
     * `new SchemaListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaListParams::with(fromObjectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaListParams)->withFromObjectType(...)
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
    public static function with(string $fromObjectType): self
    {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }
}
