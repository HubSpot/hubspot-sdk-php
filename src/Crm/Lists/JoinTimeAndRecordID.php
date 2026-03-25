<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type JoinTimeAndRecordIDShape = array{
 *   membershipTimestamp: \DateTimeInterface, recordID: string
 * }
 */
final class JoinTimeAndRecordID implements BaseModel
{
    /** @use SdkModel<JoinTimeAndRecordIDShape> */
    use SdkModel;

    /**
     * The date and time when the record was added to the list.
     */
    #[Required]
    public \DateTimeInterface $membershipTimestamp;

    /**
     * The unique identifier of the record.
     */
    #[Required('recordId')]
    public string $recordID;

    /**
     * `new JoinTimeAndRecordID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JoinTimeAndRecordID::with(membershipTimestamp: ..., recordID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JoinTimeAndRecordID)->withMembershipTimestamp(...)->withRecordID(...)
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
     */
    public static function with(
        \DateTimeInterface $membershipTimestamp,
        string $recordID
    ): self {
        $self = new self;

        $self['membershipTimestamp'] = $membershipTimestamp;
        $self['recordID'] = $recordID;

        return $self;
    }

    /**
     * The date and time when the record was added to the list.
     */
    public function withMembershipTimestamp(
        \DateTimeInterface $membershipTimestamp
    ): self {
        $self = clone $this;
        $self['membershipTimestamp'] = $membershipTimestamp;

        return $self;
    }

    /**
     * The unique identifier of the record.
     */
    public function withRecordID(string $recordID): self
    {
        $self = clone $this;
        $self['recordID'] = $recordID;

        return $self;
    }
}
