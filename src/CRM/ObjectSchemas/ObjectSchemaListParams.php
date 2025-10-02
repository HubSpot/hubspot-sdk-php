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
 * $params = (new ObjectSchemaListParams); // set properties as needed
 * $client->crm.objectSchemas->list(...$params->toArray());
 * ```
 * Get all schemas.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objectSchemas->list(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\ObjectSchemas->list
 *
 * @phpstan-type object_schema_list_params = array{archived?: bool}
 */
final class ObjectSchemaListParams implements BaseModel
{
    /** @use SdkModel<object_schema_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $archived = null): self
    {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
