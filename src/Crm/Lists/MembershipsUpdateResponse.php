<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MembershipsUpdateResponseShape = array{
 *   recordIDsMissing: list<string>,
 *   recordIDsRemoved: list<string>,
 *   recordsIDsAdded: list<string>,
 * }
 */
final class MembershipsUpdateResponse implements BaseModel
{
    /** @use SdkModel<MembershipsUpdateResponseShape> */
    use SdkModel;

    /**
     * The IDs of the records that were `missing` (e.g. did not exist in the portal) and so were not `added` or `removed`.
     *
     * @var list<string> $recordIDsMissing
     */
    #[Required('recordIdsMissing', list: 'string')]
    public array $recordIDsMissing;

    /**
     * The IDs of the records that were `removed` from the list.
     *
     * @var list<string> $recordIDsRemoved
     */
    #[Required('recordIdsRemoved', list: 'string')]
    public array $recordIDsRemoved;

    /** @var list<string> $recordsIDsAdded */
    #[Required('recordsIdsAdded', list: 'string')]
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
        $self = new self;

        $self['recordIDsMissing'] = $recordIDsMissing;
        $self['recordIDsRemoved'] = $recordIDsRemoved;
        $self['recordsIDsAdded'] = $recordsIDsAdded;

        return $self;
    }

    /**
     * The IDs of the records that were `missing` (e.g. did not exist in the portal) and so were not `added` or `removed`.
     *
     * @param list<string> $recordIDsMissing
     */
    public function withRecordIDsMissing(array $recordIDsMissing): self
    {
        $self = clone $this;
        $self['recordIDsMissing'] = $recordIDsMissing;

        return $self;
    }

    /**
     * The IDs of the records that were `removed` from the list.
     *
     * @param list<string> $recordIDsRemoved
     */
    public function withRecordIDsRemoved(array $recordIDsRemoved): self
    {
        $self = clone $this;
        $self['recordIDsRemoved'] = $recordIDsRemoved;

        return $self;
    }

    /**
     * @param list<string> $recordsIDsAdded
     */
    public function withRecordsIDsAdded(array $recordsIDsAdded): self
    {
        $self = clone $this;
        $self['recordsIDsAdded'] = $recordsIDsAdded;

        return $self;
    }
}
