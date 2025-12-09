<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse\TranscriptSource;

/**
 * @phpstan-type TranscriptResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   engagementId: int,
 *   transcriptSource: value-of<TranscriptSource>,
 *   transcriptUtterances: list<TranscriptUtterance>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class TranscriptResponse implements BaseModel
{
    /** @use SdkModel<TranscriptResponseShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public int $engagementId;

    /** @var value-of<TranscriptSource> $transcriptSource */
    #[Api(enum: TranscriptSource::class)]
    public string $transcriptSource;

    /** @var list<TranscriptUtterance> $transcriptUtterances */
    #[Api(list: TranscriptUtterance::class)]
    public array $transcriptUtterances;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * `new TranscriptResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   engagementId: ...,
     *   transcriptSource: ...,
     *   transcriptUtterances: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TranscriptResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withEngagementID(...)
     *   ->withTranscriptSource(...)
     *   ->withTranscriptUtterances(...)
     *   ->withUpdatedAt(...)
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
     * @param TranscriptSource|value-of<TranscriptSource> $transcriptSource
     * @param list<TranscriptUtterance|array{
     *   id: string,
     *   endTimeMillis: int,
     *   startTimeMillis: int,
     *   text: string,
     *   languageCode?: string|null,
     *   speaker?: Speaker|null,
     * }> $transcriptUtterances
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        int $engagementId,
        TranscriptSource|string $transcriptSource,
        array $transcriptUtterances,
        \DateTimeInterface $updatedAt,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['engagementId'] = $engagementId;
        $obj['transcriptSource'] = $transcriptSource;
        $obj['transcriptUtterances'] = $transcriptUtterances;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withEngagementID(int $engagementID): self
    {
        $obj = clone $this;
        $obj['engagementId'] = $engagementID;

        return $obj;
    }

    /**
     * @param TranscriptSource|value-of<TranscriptSource> $transcriptSource
     */
    public function withTranscriptSource(
        TranscriptSource|string $transcriptSource
    ): self {
        $obj = clone $this;
        $obj['transcriptSource'] = $transcriptSource;

        return $obj;
    }

    /**
     * @param list<TranscriptUtterance|array{
     *   id: string,
     *   endTimeMillis: int,
     *   startTimeMillis: int,
     *   text: string,
     *   languageCode?: string|null,
     *   speaker?: Speaker|null,
     * }> $transcriptUtterances
     */
    public function withTranscriptUtterances(array $transcriptUtterances): self
    {
        $obj = clone $this;
        $obj['transcriptUtterances'] = $transcriptUtterances;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
