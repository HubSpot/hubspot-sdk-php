<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The IDs of the records that were `added`, `removed`, and/or found to be `missing` as a result of the
 * membership update request.
 *
 * @phpstan-type MembershipsUpdateResponseShape = array{
 *   recordIdsMissing: list<string>,
 *   recordIdsRemoved: list<string>,
 *   recordsIdsAdded: list<string>,
 * }
 */
final class MembershipsUpdateResponse implements BaseModel
{
    /** @use SdkModel<MembershipsUpdateResponseShape> */
    use SdkModel;

    /**
     * The IDs of the records that were `missing` (e.g. did not exist in the portal) and so were not `added` or `removed`.
     *
     * @var list<string> $recordIdsMissing
     */
    #[Api(list: 'string')]
    public array $recordIdsMissing;

    /**
     * The IDs of the records that were `removed` from the list.
     *
     * @var list<string> $recordIdsRemoved
     */
    #[Api(list: 'string')]
    public array $recordIdsRemoved;

    /** @var list<string> $recordsIdsAdded */
    #[Api(list: 'string')]
    public array $recordsIdsAdded;

    /**
     * `new MembershipsUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipsUpdateResponse::with(
     *   recordIdsMissing: ..., recordIdsRemoved: ..., recordsIdsAdded: ...
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
     * @param list<string> $recordIdsMissing
     * @param list<string> $recordIdsRemoved
     * @param list<string> $recordsIdsAdded
     */
    public static function with(
        array $recordIdsMissing,
        array $recordIdsRemoved,
        array $recordsIdsAdded
    ): self {
        $obj = new self;

        $obj->recordIdsMissing = $recordIdsMissing;
        $obj->recordIdsRemoved = $recordIdsRemoved;
        $obj->recordsIdsAdded = $recordsIdsAdded;

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
        $obj->recordIdsMissing = $recordIDsMissing;

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
        $obj->recordIdsRemoved = $recordIDsRemoved;

        return $obj;
    }

    /**
     * @param list<string> $recordsIDsAdded
     */
    public function withRecordsIDsAdded(array $recordsIDsAdded): self
    {
        $obj = clone $this;
        $obj->recordsIdsAdded = $recordsIDsAdded;

        return $obj;
    }
}
