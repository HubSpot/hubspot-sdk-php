<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public bool $includeUnconfirmedUsers;

    /** @var list<string> $pipelineIDs */
    #[Api('pipelineIds', list: 'string')]
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
        $obj = new self;

        $obj->includeUnconfirmedUsers = $includeUnconfirmedUsers;
        $obj->pipelineIDs = $pipelineIDs;

        return $obj;
    }

    public function withIncludeUnconfirmedUsers(
        bool $includeUnconfirmedUsers
    ): self {
        $obj = clone $this;
        $obj->includeUnconfirmedUsers = $includeUnconfirmedUsers;

        return $obj;
    }

    /**
     * @param list<string> $pipelineIDs
     */
    public function withPipelineIDs(array $pipelineIDs): self
    {
        $obj = clone $this;
        $obj->pipelineIDs = $pipelineIDs;

        return $obj;
    }
}
