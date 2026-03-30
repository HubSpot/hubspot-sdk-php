<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallRequest\FinalCallStatus;

/**
 * @phpstan-import-type FormattedPhoneNumberShape from \HubspotSDK\Crm\Extensions\Calling\FormattedPhoneNumber
 *
 * @phpstan-type CompletedThirdPartyCallRequestShape = array{
 *   createEngagement: bool,
 *   engagementProperties: array<string,string>,
 *   externalCallID: string,
 *   finalCallStatus: FinalCallStatus|value-of<FinalCallStatus>,
 *   fromNumber: FormattedPhoneNumber|FormattedPhoneNumberShape,
 *   potentialRecipientUserIDs: list<int>,
 *   toNumber: FormattedPhoneNumber|FormattedPhoneNumberShape,
 *   callStartedTimestamp?: \DateTimeInterface|null,
 *   durationSeconds?: int|null,
 *   userID?: int|null,
 * }
 */
final class CompletedThirdPartyCallRequest implements BaseModel
{
    /** @use SdkModel<CompletedThirdPartyCallRequestShape> */
    use SdkModel;

    /**
     * Indicates whether an engagement should be created for the call.
     */
    #[Required]
    public bool $createEngagement;

    /**
     * Contains additional properties related to the engagement.
     *
     * @var array<string,string> $engagementProperties
     */
    #[Required(map: 'string')]
    public array $engagementProperties;

    /**
     * The unique identifier for the call from an external system.
     */
    #[Required('externalCallId')]
    public string $externalCallID;

    /**
     * The final status of the call, with accepted values including: BUSY, CALLING_CRM_USER, CANCELED, COMPLETED, CONNECTING, FAILED, HOLD, IN_PROGRESS, MISSED, NO_ANSWER, QUEUED, RINGING, UNKNOWN.
     *
     * @var value-of<FinalCallStatus> $finalCallStatus
     */
    #[Required(enum: FinalCallStatus::class)]
    public string $finalCallStatus;

    #[Required]
    public FormattedPhoneNumber $fromNumber;

    /** @var list<int> $potentialRecipientUserIDs */
    #[Required('potentialRecipientUserIds', list: 'int')]
    public array $potentialRecipientUserIDs;

    #[Required]
    public FormattedPhoneNumber $toNumber;

    /**
     * The timestamp indicating when the call started, formatted as a date-time string.
     */
    #[Optional]
    public ?\DateTimeInterface $callStartedTimestamp;

    /**
     * The duration of the call in seconds.
     */
    #[Optional]
    public ?int $durationSeconds;

    /**
     * The ID of the user associated with the call.
     */
    #[Optional('userId')]
    public ?int $userID;

    /**
     * `new CompletedThirdPartyCallRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompletedThirdPartyCallRequest::with(
     *   createEngagement: ...,
     *   engagementProperties: ...,
     *   externalCallID: ...,
     *   finalCallStatus: ...,
     *   fromNumber: ...,
     *   potentialRecipientUserIDs: ...,
     *   toNumber: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompletedThirdPartyCallRequest)
     *   ->withCreateEngagement(...)
     *   ->withEngagementProperties(...)
     *   ->withExternalCallID(...)
     *   ->withFinalCallStatus(...)
     *   ->withFromNumber(...)
     *   ->withPotentialRecipientUserIDs(...)
     *   ->withToNumber(...)
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
     * @param array<string,string> $engagementProperties
     * @param FinalCallStatus|value-of<FinalCallStatus> $finalCallStatus
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $fromNumber
     * @param list<int> $potentialRecipientUserIDs
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $toNumber
     */
    public static function with(
        bool $createEngagement,
        array $engagementProperties,
        string $externalCallID,
        FinalCallStatus|string $finalCallStatus,
        FormattedPhoneNumber|array $fromNumber,
        array $potentialRecipientUserIDs,
        FormattedPhoneNumber|array $toNumber,
        ?\DateTimeInterface $callStartedTimestamp = null,
        ?int $durationSeconds = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        $self['createEngagement'] = $createEngagement;
        $self['engagementProperties'] = $engagementProperties;
        $self['externalCallID'] = $externalCallID;
        $self['finalCallStatus'] = $finalCallStatus;
        $self['fromNumber'] = $fromNumber;
        $self['potentialRecipientUserIDs'] = $potentialRecipientUserIDs;
        $self['toNumber'] = $toNumber;

        null !== $callStartedTimestamp && $self['callStartedTimestamp'] = $callStartedTimestamp;
        null !== $durationSeconds && $self['durationSeconds'] = $durationSeconds;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * Indicates whether an engagement should be created for the call.
     */
    public function withCreateEngagement(bool $createEngagement): self
    {
        $self = clone $this;
        $self['createEngagement'] = $createEngagement;

        return $self;
    }

    /**
     * Contains additional properties related to the engagement.
     *
     * @param array<string,string> $engagementProperties
     */
    public function withEngagementProperties(array $engagementProperties): self
    {
        $self = clone $this;
        $self['engagementProperties'] = $engagementProperties;

        return $self;
    }

    /**
     * The unique identifier for the call from an external system.
     */
    public function withExternalCallID(string $externalCallID): self
    {
        $self = clone $this;
        $self['externalCallID'] = $externalCallID;

        return $self;
    }

    /**
     * The final status of the call, with accepted values including: BUSY, CALLING_CRM_USER, CANCELED, COMPLETED, CONNECTING, FAILED, HOLD, IN_PROGRESS, MISSED, NO_ANSWER, QUEUED, RINGING, UNKNOWN.
     *
     * @param FinalCallStatus|value-of<FinalCallStatus> $finalCallStatus
     */
    public function withFinalCallStatus(
        FinalCallStatus|string $finalCallStatus
    ): self {
        $self = clone $this;
        $self['finalCallStatus'] = $finalCallStatus;

        return $self;
    }

    /**
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $fromNumber
     */
    public function withFromNumber(FormattedPhoneNumber|array $fromNumber): self
    {
        $self = clone $this;
        $self['fromNumber'] = $fromNumber;

        return $self;
    }

    /**
     * @param list<int> $potentialRecipientUserIDs
     */
    public function withPotentialRecipientUserIDs(
        array $potentialRecipientUserIDs
    ): self {
        $self = clone $this;
        $self['potentialRecipientUserIDs'] = $potentialRecipientUserIDs;

        return $self;
    }

    /**
     * @param FormattedPhoneNumber|FormattedPhoneNumberShape $toNumber
     */
    public function withToNumber(FormattedPhoneNumber|array $toNumber): self
    {
        $self = clone $this;
        $self['toNumber'] = $toNumber;

        return $self;
    }

    /**
     * The timestamp indicating when the call started, formatted as a date-time string.
     */
    public function withCallStartedTimestamp(
        \DateTimeInterface $callStartedTimestamp
    ): self {
        $self = clone $this;
        $self['callStartedTimestamp'] = $callStartedTimestamp;

        return $self;
    }

    /**
     * The duration of the call in seconds.
     */
    public function withDurationSeconds(int $durationSeconds): self
    {
        $self = clone $this;
        $self['durationSeconds'] = $durationSeconds;

        return $self;
    }

    /**
     * The ID of the user associated with the call.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
