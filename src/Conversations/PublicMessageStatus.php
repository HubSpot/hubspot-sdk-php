<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicMessageStatus\StatusType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicMessageStatusShape = array{
 *   statusType: value-of<StatusType>,
 *   failureDetails?: PublicMessageFailureDetails|null,
 * }
 */
final class PublicMessageStatus implements BaseModel
{
    /** @use SdkModel<PublicMessageStatusShape> */
    use SdkModel;

    /** @var value-of<StatusType> $statusType */
    #[Required(enum: StatusType::class)]
    public string $statusType;

    #[Optional]
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
     * @param PublicMessageFailureDetails|array{
     *   errorMessageTokens: array<string,string>, errorMessage?: string|null
     * } $failureDetails
     */
    public static function with(
        StatusType|string $statusType,
        PublicMessageFailureDetails|array|null $failureDetails = null,
    ): self {
        $self = new self;

        $self['statusType'] = $statusType;

        null !== $failureDetails && $self['failureDetails'] = $failureDetails;

        return $self;
    }

    /**
     * @param StatusType|value-of<StatusType> $statusType
     */
    public function withStatusType(StatusType|string $statusType): self
    {
        $self = clone $this;
        $self['statusType'] = $statusType;

        return $self;
    }

    /**
     * @param PublicMessageFailureDetails|array{
     *   errorMessageTokens: array<string,string>, errorMessage?: string|null
     * } $failureDetails
     */
    public function withFailureDetails(
        PublicMessageFailureDetails|array $failureDetails
    ): self {
        $self = clone $this;
        $self['failureDetails'] = $failureDetails;

        return $self;
    }
}
