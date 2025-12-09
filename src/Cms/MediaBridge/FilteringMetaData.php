<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FilteringMetaDataShape = array{
 *   includeUnconfirmedUsers: bool, pipelineIDs: list<string>
 * }
 */
final class FilteringMetaData implements BaseModel
{
    /** @use SdkModel<FilteringMetaDataShape> */
    use SdkModel;

    #[Required]
    public bool $includeUnconfirmedUsers;

    /** @var list<string> $pipelineIDs */
    #[Required('pipelineIds', list: 'string')]
    public array $pipelineIDs;

    /**
     * `new FilteringMetaData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilteringMetaData::with(includeUnconfirmedUsers: ..., pipelineIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilteringMetaData)->withIncludeUnconfirmedUsers(...)->withPipelineIDs(...)
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
     * @param list<string> $pipelineIDs
     */
    public static function with(
        bool $includeUnconfirmedUsers,
        array $pipelineIDs
    ): self {
        $self = new self;

        $self['includeUnconfirmedUsers'] = $includeUnconfirmedUsers;
        $self['pipelineIDs'] = $pipelineIDs;

        return $self;
    }

    public function withIncludeUnconfirmedUsers(
        bool $includeUnconfirmedUsers
    ): self {
        $self = clone $this;
        $self['includeUnconfirmedUsers'] = $includeUnconfirmedUsers;

        return $self;
    }

    /**
     * @param list<string> $pipelineIDs
     */
    public function withPipelineIDs(array $pipelineIDs): self
    {
        $self = clone $this;
        $self['pipelineIDs'] = $pipelineIDs;

        return $self;
    }
}
