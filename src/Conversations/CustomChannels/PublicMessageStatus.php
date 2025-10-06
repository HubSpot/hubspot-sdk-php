<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\PublicMessageStatus\StatusType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_message_status = array{
 *   statusType: value-of<StatusType>, failureDetails?: PublicMessageFailureDetails
 * }
 */
final class PublicMessageStatus implements BaseModel
{
    /** @use SdkModel<public_message_status> */
    use SdkModel;

    /** @var value-of<StatusType> $statusType */
    #[Api(enum: StatusType::class)]
    public string $statusType;

    #[Api(optional: true)]
    public ?PublicMessageFailureDetails $failureDetails;

    /**
     * `new PublicMessageStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicMessageStatus::with(statusType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicMessageStatus)->withStatusType(...)
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
     * @param StatusType|value-of<StatusType> $statusType
     */
    public static function with(
        StatusType|string $statusType,
        ?PublicMessageFailureDetails $failureDetails = null,
    ): self {
        $obj = new self;

        $obj['statusType'] = $statusType;

        null !== $failureDetails && $obj->failureDetails = $failureDetails;

        return $obj;
    }

    /**
     * @param StatusType|value-of<StatusType> $statusType
     */
    public function withStatusType(StatusType|string $statusType): self
    {
        $obj = clone $this;
        $obj['statusType'] = $statusType;

        return $obj;
    }

    public function withFailureDetails(
        PublicMessageFailureDetails $failureDetails
    ): self {
        $obj = clone $this;
        $obj->failureDetails = $failureDetails;

        return $obj;
    }
}
