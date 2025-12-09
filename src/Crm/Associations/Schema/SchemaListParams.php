<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Associations\SchemaService::list()
 *
 * @phpstan-type SchemaListParamsShape = array{fromObjectType: string}
 */
final class SchemaListParams implements BaseModel
{
    /** @use SdkModel<SchemaListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }
}
