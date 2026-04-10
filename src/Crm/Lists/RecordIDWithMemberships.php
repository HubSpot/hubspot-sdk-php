<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RecordListMembershipShape from \HubSpotSDK\Crm\Lists\RecordListMembership
 *
 * @phpstan-type RecordIDWithMembershipsShape = array{
 *   objectTypeID: string,
 *   recordID: string,
 *   recordListMemberships: list<RecordListMembership|RecordListMembershipShape>,
 * }
 */
final class RecordIDWithMemberships implements BaseModel
{
    /** @use SdkModel<RecordIDWithMembershipsShape> */
    use SdkModel;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('recordId')]
    public string $recordID;

    /** @var list<RecordListMembership> $recordListMemberships */
    #[Required(list: RecordListMembership::class)]
    public array $recordListMemberships;

    /**
     * `new RecordIDWithMemberships()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordIDWithMemberships::with(
     *   objectTypeID: ..., recordID: ..., recordListMemberships: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordIDWithMemberships)
     *   ->withObjectTypeID(...)
     *   ->withRecordID(...)
     *   ->withRecordListMemberships(...)
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
     * @param list<RecordListMembership|RecordListMembershipShape> $recordListMemberships
     */
    public static function with(
        string $objectTypeID,
        string $recordID,
        array $recordListMemberships
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['recordID'] = $recordID;
        $self['recordListMemberships'] = $recordListMemberships;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withRecordID(string $recordID): self
    {
        $self = clone $this;
        $self['recordID'] = $recordID;

        return $self;
    }

    /**
     * @param list<RecordListMembership|RecordListMembershipShape> $recordListMemberships
     */
    public function withRecordListMemberships(
        array $recordListMemberships
    ): self {
        $self = clone $this;
        $self['recordListMemberships'] = $recordListMemberships;

        return $self;
    }
}
