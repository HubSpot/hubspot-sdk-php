<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Extensions\Calling\TranscriptsService::create()
 *
 * @phpstan-import-type TranscriptCreateUtteranceShape from \HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateUtterance
 *
 * @phpstan-type TranscriptCreateParamsShape = array{
 *   engagementID: int,
 *   transcriptCreateUtterances: list<TranscriptCreateUtterance|TranscriptCreateUtteranceShape>,
 * }
 */
final class TranscriptCreateParams implements BaseModel
{
    /** @use SdkModel<TranscriptCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('engagementId')]
    public int $engagementID;

    /** @var list<TranscriptCreateUtterance> $transcriptCreateUtterances */
    #[Required(list: TranscriptCreateUtterance::class)]
    public array $transcriptCreateUtterances;

    /**
     * `new TranscriptCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptCreateParams::with(engagementID: ..., transcriptCreateUtterances: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TranscriptCreateParams)
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
