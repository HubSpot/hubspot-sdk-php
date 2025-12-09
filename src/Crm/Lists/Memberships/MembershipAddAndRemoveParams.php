<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Memberships;

use HubspotSDK\Core\Attributes\Required;
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
 *   recordIDsToAdd: list<string>, recordIDsToRemove: list<string>
 * }
 */
final class MembershipAddAndRemoveParams implements BaseModel
{
    /** @use SdkModel<MembershipAddAndRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $recordIDsToAdd */
    #[Required('recordIdsToAdd', list: 'string')]
    public array $recordIDsToAdd;

    /** @var list<string> $recordIDsToRemove */
    #[Required('recordIdsToRemove', list: 'string')]
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
        $self = new self;

        $self['recordIDsToAdd'] = $recordIDsToAdd;
        $self['recordIDsToRemove'] = $recordIDsToRemove;

        return $self;
    }

    /**
     * @param list<string> $recordIDsToAdd
     */
    public function withRecordIDsToAdd(array $recordIDsToAdd): self
    {
        $self = clone $this;
        $self['recordIDsToAdd'] = $recordIDsToAdd;

        return $self;
    }

    /**
     * @param list<string> $recordIDsToRemove
     */
    public function withRecordIDsToRemove(array $recordIDsToRemove): self
    {
        $self = clone $this;
        $self['recordIDsToRemove'] = $recordIDsToRemove;

        return $self;
    }
}
