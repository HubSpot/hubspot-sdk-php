<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptCreateRequestShape = array{
 *   engagementId: int, transcriptCreateUtterances: list<TranscriptCreateUtterance>
 * }
 */
final class TranscriptCreateRequest implements BaseModel
{
    /** @use SdkModel<TranscriptCreateRequestShape> */
    use SdkModel;

    #[Api]
    public int $engagementId;

    /** @var list<TranscriptCreateUtterance> $transcriptCreateUtterances */
    #[Api(list: TranscriptCreateUtterance::class)]
    public array $transcriptCreateUtterances;

    /**
     * `new TranscriptCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptCreateRequest::with(
     *   engagementId: ..., transcriptCreateUtterances: ...
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
     * @param list<TranscriptCreateUtterance|array{
     *   endTimeMillis: int,
     *   speaker: Speaker,
     *   startTimeMillis: int,
     *   text: string,
     *   languageCode?: string|null,
     * }> $transcriptCreateUtterances
     */
    public static function with(
        int $engagementId,
        array $transcriptCreateUtterances
    ): self {
        $obj = new self;

        $obj['engagementId'] = $engagementId;
        $obj['transcriptCreateUtterances'] = $transcriptCreateUtterances;

        return $obj;
    }

    public function withEngagementID(int $engagementID): self
    {
        $obj = clone $this;
        $obj['engagementId'] = $engagementID;

        return $obj;
    }

    /**
     * @param list<TranscriptCreateUtterance|array{
     *   endTimeMillis: int,
     *   speaker: Speaker,
     *   startTimeMillis: int,
     *   text: string,
     *   languageCode?: string|null,
     * }> $transcriptCreateUtterances
     */
    public function withTranscriptCreateUtterances(
        array $transcriptCreateUtterances
    ): self {
        $obj = clone $this;
        $obj['transcriptCreateUtterances'] = $transcriptCreateUtterances;

        return $obj;
    }
}
