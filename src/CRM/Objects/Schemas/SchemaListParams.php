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
 * $params = (new SchemaListParams); // set properties as needed
 * $client->crm.objects.schemas->list(...$params->toArray());
 * ```
 * Get all schemas.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.schemas->list(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Schemas->list
 *
 * @phpstan-type schema_list_params = array{archived?: bool}
 */
final class SchemaListParams implements BaseModel
{
    /** @use SdkModel<schema_list_params> */
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
