<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists\Memberships;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add and/or remove records that have already been created in the system to and/or from a list.
 *
 * This endpoint only works for lists that have a `processingType` of `MANUAL` or `SNAPSHOT`.
 *
 * @see HubspotSDK\CRM\Lists\Memberships->addAndRemove
 *
 * @phpstan-type MembershipAddAndRemoveParamsShape = array{
 *   recordIDsToAdd: list<string>, recordIDsToRemove: list<string>
 * }
 */
final class MembershipAddAndRemoveParams implements BaseModel
{
    /** @use SdkModel<MembershipAddAndRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $recordIDsToAdd */
    #[Api('recordIdsToAdd', list: 'string')]
    public array $recordIDsToAdd;

    /** @var list<string> $recordIDsToRemove */
    #[Api('recordIdsToRemove', list: 'string')]
    public array $recordIDsToRemove;

    /**
     * `new MembershipAddAndRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MembershipAddAndRemoveParams::with(recordIDsToAdd: ..., recordIDsToRemove: ...)
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
