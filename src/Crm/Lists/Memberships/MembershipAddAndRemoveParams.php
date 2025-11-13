<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Memberships;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add and/or remove records that have already been created in the system to and/or from a list.
 *
 * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
 *
 * @see HubspotSDK\Services\Crm\Lists\MembershipsService::addAndRemove()
 *
 * @phpstan-type MembershipAddAndRemoveParamsShape = array{
 *   recordIdsToAdd: list<string>, recordIdsToRemove: list<string>
 * }
 */
final class MembershipAddAndRemoveParams implements BaseModel
{
    /** @use SdkModel<MembershipAddAndRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $recordIdsToAdd */
    #[Api(list: 'string')]
    public array $recordIdsToAdd;

    /** @var list<string> $recordIdsToRemove */
    #[Api(list: 'string')]
    public array $recordIdsToRemove;

    /**
     * `new MembershipAddAndRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipAddAndRemoveParams::with(recordIdsToAdd: ..., recordIdsToRemove: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MembershipAddAndRemoveParams)
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

        $obj->recordIdsToAdd = $recordIdsToAdd;
        $obj->recordIdsToRemove = $recordIdsToRemove;

        return $obj;
    }

    /**
     * @param list<string> $recordIDsToAdd
     */
    public function withRecordIDsToAdd(array $recordIDsToAdd): self
    {
        $obj = clone $this;
        $obj->recordIdsToAdd = $recordIDsToAdd;

        return $obj;
    }

    /**
     * @param list<string> $recordIDsToRemove
     */
    public function withRecordIDsToRemove(array $recordIDsToRemove): self
    {
        $obj = clone $this;
        $obj->recordIdsToRemove = $recordIDsToRemove;

        return $obj;
    }
}
