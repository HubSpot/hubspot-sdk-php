<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MembershipChangeRequestShape = array{
 *   recordIDsToAdd: list<string>, recordIDsToRemove: list<string>
 * }
 */
final class MembershipChangeRequest implements BaseModel
{
    /** @use SdkModel<MembershipChangeRequestShape> */
    use SdkModel;

    /** @var list<string> $recordIDsToAdd */
    #[Required('recordIdsToAdd', list: 'string')]
    public array $recordIDsToAdd;

    /** @var list<string> $recordIDsToRemove */
    #[Required('recordIdsToRemove', list: 'string')]
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
