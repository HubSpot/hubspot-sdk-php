<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TranscriptCreateUtteranceShape from \HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance
 *
 * @phpstan-type TranscriptCreateRequestShape = array{
 *   engagementID: int,
 *   transcriptCreateUtterances: list<TranscriptCreateUtterance|TranscriptCreateUtteranceShape>,
 * }
 */
final class TranscriptCreateRequest implements BaseModel
{
    /** @use SdkModel<TranscriptCreateRequestShape> */
    use SdkModel;

    #[Required('engagementId')]
    public int $engagementID;

    /** @var list<TranscriptCreateUtterance> $transcriptCreateUtterances */
    #[Required(list: TranscriptCreateUtterance::class)]
    public array $transcriptCreateUtterances;

    /**
     * `new TranscriptCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptCreateRequest::with(
     *   engagementID: ..., transcriptCreateUtterances: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TranscriptCreateRequest)
     *   ->withEngagementID(...)
     *   ->withTranscriptCreateUtterances(...)
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
     * @param list<TranscriptCreateUtterance|TranscriptCreateUtteranceShape> $transcriptCreateUtterances
     */
    public static function with(
        int $engagementID,
        array $transcriptCreateUtterances
    ): self {
        $self = new self;

        $self['engagementID'] = $engagementID;
        $self['transcriptCreateUtterances'] = $transcriptCreateUtterances;

        return $self;
    }

    public function withEngagementID(int $engagementID): self
    {
        $self = clone $this;
        $self['engagementID'] = $engagementID;

        return $self;
    }

    /**
     * @param list<TranscriptCreateUtterance|TranscriptCreateUtteranceShape> $transcriptCreateUtterances
     */
    public function withTranscriptCreateUtterances(
        array $transcriptCreateUtterances
    ): self {
        $self = clone $this;
        $self['transcriptCreateUtterances'] = $transcriptCreateUtterances;

        return $self;
    }
}
