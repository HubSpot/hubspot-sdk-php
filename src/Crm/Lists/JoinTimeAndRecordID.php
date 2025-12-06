<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type JoinTimeAndRecordIDShape = array{
 *   membershipTimestamp: \DateTimeInterface, recordId: string
 * }
 */
final class JoinTimeAndRecordID implements BaseModel
{
    /** @use SdkModel<JoinTimeAndRecordIDShape> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $membershipTimestamp;

    #[Api]
    public string $recordId;

    /**
     * `new JoinTimeAndRecordID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JoinTimeAndRecordID::with(membershipTimestamp: ..., recordId: ...)
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
        string $recordId
    ): self {
        $obj = new self;

        $obj['membershipTimestamp'] = $membershipTimestamp;
        $obj['recordId'] = $recordId;

        return $obj;
    }

    public function withMembershipTimestamp(
        \DateTimeInterface $membershipTimestamp
    ): self {
        $obj = clone $this;
        $obj['membershipTimestamp'] = $membershipTimestamp;

        return $obj;
    }

    public function withRecordID(string $recordID): self
    {
        $obj = clone $this;
        $obj['recordId'] = $recordID;

        return $obj;
    }
}
