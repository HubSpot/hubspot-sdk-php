<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Mapping;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This API allows translation of a batch of legacy list id's to list id's. This allows for a maximum of 10,000 id's. This is a temporary API allowed for mapping old id's to new id's and will expire on May 30th, 2025.
 *
 * @see HubspotSDK\Services\Crm\Lists\MappingService::batchCreateIDMapping()
 *
 * @phpstan-type MappingBatchCreateIDMappingParamsShape = array{body: list<string>}
 */
final class MappingBatchCreateIDMappingParams implements BaseModel
{
    /** @use SdkModel<MappingBatchCreateIDMappingParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $body */
    #[Required(list: 'string')]
    public array $body;

    /**
     * `new MappingBatchCreateIDMappingParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MappingBatchCreateIDMappingParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MappingBatchCreateIDMappingParams)->withBody(...)
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
     * @param list<string> $body
     */
    public static function with(array $body): self
    {
        $self = new self;

        $self['body'] = $body;

        return $self;
    }

    /**
     * @param list<string> $body
     */
    public function withBody(array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
