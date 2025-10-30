<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The IDs of the records to add and/or remove from a list.
 *
 * @phpstan-type MembershipChangeRequestShape = array{
 *   recordIDsToAdd: list<string>, recordIDsToRemove: list<string>
 * }
 */
final class MembershipChangeRequest implements BaseModel
{
    /** @use SdkModel<MembershipChangeRequestShape> */
    use SdkModel;

    /** @var list<string> $recordIDsToAdd */
    #[Api('recordIdsToAdd', list: 'string')]
    public array $recordIDsToAdd;

    /** @var list<string> $recordIDsToRemove */
    #[Api('recordIdsToRemove', list: 'string')]
    public array $recordIDsToRemove;

    /**
     * `new MembershipChangeRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipChangeRequest::with(recordIDsToAdd: ..., recordIDsToRemove: ...)
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
     * @param list<string> $recordIDsToAdd
     * @param list<string> $recordIDsToRemove
     */
    public static function with(
        array $recordIDsToAdd,
        array $recordIDsToRemove
    ): self {
        $obj = new self;

        $obj->recordIDsToAdd = $recordIDsToAdd;
        $obj->recordIDsToRemove = $recordIDsToRemove;

        return $obj;
    }

    /**
     * @param list<string> $recordIDsToAdd
     */
    public function withRecordIDsToAdd(array $recordIDsToAdd): self
    {
        $obj = clone $this;
        $obj->recordIDsToAdd = $recordIDsToAdd;

        return $obj;
    }

    /**
     * @param list<string> $recordIDsToRemove
     */
    public function withRecordIDsToRemove(array $recordIDsToRemove): self
    {
        $obj = clone $this;
        $obj->recordIDsToRemove = $recordIDsToRemove;

        return $obj;
    }
}
