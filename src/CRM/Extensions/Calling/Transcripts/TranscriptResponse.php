<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\CRM\Extensions\Calling\Transcripts\TranscriptResponse\TranscriptSource;

/**
 * @phpstan-type TranscriptResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   engagementID: int,
 *   transcriptSource: value-of<TranscriptSource>,
 *   transcriptUtterances: list<TranscriptUtterance>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class TranscriptResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TranscriptResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api('engagementId')]
    public int $engagementID;

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
     *   engagementID: ...,
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
     * @param list<TranscriptUtterance> $transcriptUtterances
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        int $engagementID,
        TranscriptSource|string $transcriptSource,
        array $transcriptUtterances,
        \DateTimeInterface $updatedAt,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->engagementID = $engagementID;
        $obj['transcriptSource'] = $transcriptSource;
        $obj->transcriptUtterances = $transcriptUtterances;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withEngagementID(int $engagementID): self
    {
        $obj = clone $this;
        $obj->engagementID = $engagementID;

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
     * @param list<TranscriptUtterance> $transcriptUtterances
     */
    public function withTranscriptUtterances(array $transcriptUtterances): self
    {
        $obj = clone $this;
        $obj->transcriptUtterances = $transcriptUtterances;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
