<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FilteringMetaDataShape = array{
 *   includeHelpdeskRoutableTeamsOnly: bool,
 *   includeUnconfirmedUsers: bool,
 *   listProcessingTypes: list<string>,
 *   pipelineIDs: list<string>,
 * }
 */
final class FilteringMetaData implements BaseModel
{
    /** @use SdkModel<FilteringMetaDataShape> */
    use SdkModel;

    #[Required]
    public bool $includeHelpdeskRoutableTeamsOnly;

    #[Required]
    public bool $includeUnconfirmedUsers;

    /** @var list<string> $listProcessingTypes */
    #[Required(list: 'string')]
    public array $listProcessingTypes;

    /** @var list<string> $pipelineIDs */
    #[Required('pipelineIds', list: 'string')]
    public array $pipelineIDs;

    /**
     * `new FilteringMetaData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilteringMetaData::with(
     *   includeHelpdeskRoutableTeamsOnly: ...,
     *   includeUnconfirmedUsers: ...,
     *   listProcessingTypes: ...,
     *   pipelineIDs: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilteringMetaData)
     *   ->withIncludeHelpdeskRoutableTeamsOnly(...)
     *   ->withIncludeUnconfirmedUsers(...)
     *   ->withListProcessingTypes(...)
     *   ->withPipelineIDs(...)
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
     * @param list<string> $listProcessingTypes
     * @param list<string> $pipelineIDs
     */
    public static function with(
        bool $includeHelpdeskRoutableTeamsOnly,
        bool $includeUnconfirmedUsers,
        array $listProcessingTypes,
        array $pipelineIDs,
    ): self {
        $self = new self;

        $self['includeHelpdeskRoutableTeamsOnly'] = $includeHelpdeskRoutableTeamsOnly;
        $self['includeUnconfirmedUsers'] = $includeUnconfirmedUsers;
        $self['listProcessingTypes'] = $listProcessingTypes;
        $self['pipelineIDs'] = $pipelineIDs;

        return $self;
    }

    public function withIncludeHelpdeskRoutableTeamsOnly(
        bool $includeHelpdeskRoutableTeamsOnly
    ): self {
        $self = clone $this;
        $self['includeHelpdeskRoutableTeamsOnly'] = $includeHelpdeskRoutableTeamsOnly;

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
     * @param list<string> $listProcessingTypes
     */
    public function withListProcessingTypes(array $listProcessingTypes): self
    {
        $self = clone $this;
        $self['listProcessingTypes'] = $listProcessingTypes;

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
