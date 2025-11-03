<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptCreateRequestShape = array{
 *   engagementID: int, transcriptCreateUtterances: list<TranscriptCreateUtterance>
 * }
 */
final class TranscriptCreateRequest implements BaseModel
{
    /** @use SdkModel<TranscriptCreateRequestShape> */
    use SdkModel;

    #[Api('engagementId')]
    public int $engagementID;

    /** @var list<TranscriptCreateUtterance> $transcriptCreateUtterances */
    #[Api(list: TranscriptCreateUtterance::class)]
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
     * @param list<TranscriptCreateUtterance> $transcriptCreateUtterances
     */
    public static function with(
        int $engagementID,
        array $transcriptCreateUtterances
    ): self {
        $obj = new self;

        $obj->engagementID = $engagementID;
        $obj->transcriptCreateUtterances = $transcriptCreateUtterances;

        return $obj;
    }

    public function withEngagementID(int $engagementID): self
    {
        $obj = clone $this;
        $obj->engagementID = $engagementID;

        return $obj;
    }

    /**
     * @param list<TranscriptCreateUtterance> $transcriptCreateUtterances
     */
    public function withTranscriptCreateUtterances(
        array $transcriptCreateUtterances
    ): self {
        $obj = clone $this;
        $obj->transcriptCreateUtterances = $transcriptCreateUtterances;

        return $obj;
    }
}
