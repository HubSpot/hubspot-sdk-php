<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DateTimeShape from \HubspotSDK\Crm\Associations\V4\DateTime
 *
 * @phpstan-type ReportCreationResponseShape = array{
 *   enqueueTime: DateTime|DateTimeShape, userEmail: string, userID: int
 * }
 */
final class ReportCreationResponse implements BaseModel
{
    /** @use SdkModel<ReportCreationResponseShape> */
    use SdkModel;

    #[Required]
    public DateTime $enqueueTime;

    /**
     * Email of the user.
     */
    #[Required]
    public string $userEmail;

    /**
     * ID of the user.
     */
    #[Required('userId')]
    public int $userID;

    /**
     * `new ReportCreationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReportCreationResponse::with(enqueueTime: ..., userEmail: ..., userID: ...)
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
     * @param DateTime|DateTimeShape $enqueueTime
     */
    public static function with(
        DateTime|array $enqueueTime,
        string $userEmail,
        int $userID
    ): self {
        $self = new self;

        $self['enqueueTime'] = $enqueueTime;
        $self['userEmail'] = $userEmail;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * @param DateTime|DateTimeShape $enqueueTime
     */
    public function withEnqueueTime(DateTime|array $enqueueTime): self
    {
        $self = clone $this;
        $self['enqueueTime'] = $enqueueTime;

        return $self;
    }

    /**
     * Email of the user.
     */
    public function withUserEmail(string $userEmail): self
    {
        $self = clone $this;
        $self['userEmail'] = $userEmail;

        return $self;
    }

    /**
     * ID of the user.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
