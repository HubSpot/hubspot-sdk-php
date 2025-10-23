<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The IDs of the records that were `added`, `removed`, and/or found to be `missing` as a result of the
 * membership update request.
 *
 * @phpstan-type memberships_update_response = array{
 *   recordIDsMissing: list<string>,
 *   recordIDsRemoved: list<string>,
 *   recordsIDsAdded: list<string>,
 * }
 */
final class MembershipsUpdateResponse implements BaseModel
{
    /** @use SdkModel<memberships_update_response> */
    use SdkModel;

    /**
     * The IDs of the records that were `missing` (e.g. did not exist in the portal) and so were not `added` or `removed`.
     *
     * @var list<string> $recordIDsMissing
     */
    #[Api('recordIdsMissing', list: 'string')]
    public array $recordIDsMissing;

    /**
     * The IDs of the records that were `removed` from the list.
     *
     * @var list<string> $recordIDsRemoved
     */
    #[Api('recordIdsRemoved', list: 'string')]
    public array $recordIDsRemoved;

    /** @var list<string> $recordsIDsAdded */
    #[Api('recordsIdsAdded', list: 'string')]
    public array $recordsIDsAdded;

    /**
     * `new MembershipsUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipsUpdateResponse::with(
     *   recordIDsMissing: ..., recordIDsRemoved: ..., recordsIDsAdded: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MembershipsUpdateResponse)
     *   ->withRecordIDsMissing(...)
     *   ->withRecordIDsRemoved(...)
     *   ->withRecordsIDsAdded(...)
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
     * @param list<string> $recordIDsMissing
     * @param list<string> $recordIDsRemoved
     * @param list<string> $recordsIDsAdded
     */
    public static function with(
        array $recordIDsMissing,
        array $recordIDsRemoved,
        array $recordsIDsAdded
    ): self {
        $obj = new self;

        $obj->recordIDsMissing = $recordIDsMissing;
        $obj->recordIDsRemoved = $recordIDsRemoved;
        $obj->recordsIDsAdded = $recordsIDsAdded;

        return $obj;
    }

    /**
     * The IDs of the records that were `missing` (e.g. did not exist in the portal) and so were not `added` or `removed`.
     *
     * @param list<string> $recordIDsMissing
     */
    public function withRecordIDsMissing(array $recordIDsMissing): self
    {
        $obj = clone $this;
        $obj->recordIDsMissing = $recordIDsMissing;

        return $obj;
    }

    /**
     * The IDs of the records that were `removed` from the list.
     *
     * @param list<string> $recordIDsRemoved
     */
    public function withRecordIDsRemoved(array $recordIDsRemoved): self
    {
        $obj = clone $this;
        $obj->recordIDsRemoved = $recordIDsRemoved;

        return $obj;
    }

    /**
     * @param list<string> $recordsIDsAdded
     */
    public function withRecordsIDsAdded(array $recordsIDsAdded): self
    {
        $obj = clone $this;
        $obj->recordsIDsAdded = $recordsIDsAdded;

        return $obj;
    }
}
