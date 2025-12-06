<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReportCreationResponseShape = array{
 *   enqueueTime: DateTime, userEmail: string, userId: int
 * }
 */
final class ReportCreationResponse implements BaseModel
{
    /** @use SdkModel<ReportCreationResponseShape> */
    use SdkModel;

    #[Api]
    public DateTime $enqueueTime;

    /**
     * Email of the user.
     */
    #[Api]
    public string $userEmail;

    /**
     * ID of the user.
     */
    #[Api]
    public int $userId;

    /**
     * `new ReportCreationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReportCreationResponse::with(enqueueTime: ..., userEmail: ..., userId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReportCreationResponse)
     *   ->withEnqueueTime(...)
     *   ->withUserEmail(...)
     *   ->withUserID(...)
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
     * @param DateTime|array{
     *   dateOnly: bool, timeZoneShift: int, value: int
     * } $enqueueTime
     */
    public static function with(
        DateTime|array $enqueueTime,
        string $userEmail,
        int $userId
    ): self {
        $obj = new self;

        $obj['enqueueTime'] = $enqueueTime;
        $obj['userEmail'] = $userEmail;
        $obj['userId'] = $userId;

        return $obj;
    }

    /**
     * @param DateTime|array{
     *   dateOnly: bool, timeZoneShift: int, value: int
     * } $enqueueTime
     */
    public function withEnqueueTime(DateTime|array $enqueueTime): self
    {
        $obj = clone $this;
        $obj['enqueueTime'] = $enqueueTime;

        return $obj;
    }

    /**
     * Email of the user.
     */
    public function withUserEmail(string $userEmail): self
    {
        $obj = clone $this;
        $obj['userEmail'] = $userEmail;

        return $obj;
    }

    /**
     * ID of the user.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }
}
