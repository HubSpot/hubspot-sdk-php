<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type associations_v4_report_creation_response = array{
 *   enqueueTime: AssociationsV4DateTime, userEmail: string, userID: int
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AssociationsV4ReportCreationResponse implements BaseModel
{
    /** @use SdkModel<associations_v4_report_creation_response> */
    use SdkModel;

    #[Api]
    public AssociationsV4DateTime $enqueueTime;

    #[Api]
    public string $userEmail;

    #[Api('userId')]
    public int $userID;

    /**
     * `new AssociationsV4ReportCreationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4ReportCreationResponse::with(
     *   enqueueTime: ..., userEmail: ..., userID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4ReportCreationResponse)
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
        AssociationsV4DateTime $enqueueTime,
        string $userEmail,
        int $userID
    ): self {
        $obj = new self;

        $obj->enqueueTime = $enqueueTime;
        $obj->userEmail = $userEmail;
        $obj->userID = $userID;

        return $obj;
    }

    public function withEnqueueTime(AssociationsV4DateTime $enqueueTime): self
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
        $obj->userID = $userID;

        return $obj;
    }
}
