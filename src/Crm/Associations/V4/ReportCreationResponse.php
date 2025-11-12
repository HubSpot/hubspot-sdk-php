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

    #[Api]
    public string $userEmail;

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
     */
    public static function with(
        DateTime $enqueueTime,
        string $userEmail,
        int $userId
    ): self {
        $obj = new self;

        $obj->enqueueTime = $enqueueTime;
        $obj->userEmail = $userEmail;
        $obj->userId = $userId;

        return $obj;
    }

    public function withEnqueueTime(DateTime $enqueueTime): self
    {
        $obj = clone $this;
        $obj->enqueueTime = $enqueueTime;

        return $obj;
    }

    public function withUserEmail(string $userEmail): self
    {
        $obj = clone $this;
        $obj->userEmail = $userEmail;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }
}
