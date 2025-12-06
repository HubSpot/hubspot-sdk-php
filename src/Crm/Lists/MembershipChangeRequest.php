<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The IDs of the records to add and/or remove from a list.
 *
 * @phpstan-type MembershipChangeRequestShape = array{
 *   recordIdsToAdd: list<string>, recordIdsToRemove: list<string>
 * }
 */
final class MembershipChangeRequest implements BaseModel
{
    /** @use SdkModel<MembershipChangeRequestShape> */
    use SdkModel;

    /** @var list<string> $recordIdsToAdd */
    #[Api(list: 'string')]
    public array $recordIdsToAdd;

    /** @var list<string> $recordIdsToRemove */
    #[Api(list: 'string')]
    public array $recordIdsToRemove;

    /**
     * `new MembershipChangeRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipChangeRequest::with(recordIdsToAdd: ..., recordIdsToRemove: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MembershipChangeRequest)
     *   ->withRecordIDsToAdd(...)
     *   ->withRecordIDsToRemove(...)
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
     * @param list<string> $recordIdsToAdd
     * @param list<string> $recordIdsToRemove
     */
    public static function with(
        array $recordIdsToAdd,
        array $recordIdsToRemove
    ): self {
        $obj = new self;

        $obj['recordIdsToAdd'] = $recordIdsToAdd;
        $obj['recordIdsToRemove'] = $recordIdsToRemove;

        return $obj;
    }

    /**
     * @param list<string> $recordIDsToAdd
     */
    public function withRecordIDsToAdd(array $recordIDsToAdd): self
    {
        $obj = clone $this;
        $obj['recordIdsToAdd'] = $recordIDsToAdd;

        return $obj;
    }

    /**
     * @param list<string> $recordIDsToRemove
     */
    public function withRecordIDsToRemove(array $recordIDsToRemove): self
    {
        $obj = clone $this;
        $obj['recordIdsToRemove'] = $recordIDsToRemove;

        return $obj;
    }
}
