<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptResponse\TranscriptSource;

/**
 * @phpstan-import-type TranscriptUtteranceShape from \HubspotSDK\Crm\Extensions\Calling\Transcripts\TranscriptUtterance
 *
 * @phpstan-type TranscriptResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   engagementID: int,
 *   transcriptSource: TranscriptSource|value-of<TranscriptSource>,
 *   transcriptUtterances: list<TranscriptUtterance|TranscriptUtteranceShape>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class TranscriptResponse implements BaseModel
{
    /** @use SdkModel<TranscriptResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required('engagementId')]
    public int $engagementID;

    /** @var value-of<TranscriptSource> $transcriptSource */
    #[Required(enum: TranscriptSource::class)]
    public string $transcriptSource;

    /** @var list<TranscriptUtterance> $transcriptUtterances */
    #[Required(list: TranscriptUtterance::class)]
    public array $transcriptUtterances;

    #[Required]
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
     * @param list<TranscriptUtterance|TranscriptUtteranceShape> $transcriptUtterances
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        int $engagementID,
        TranscriptSource|string $transcriptSource,
        array $transcriptUtterances,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['engagementID'] = $engagementID;
        $self['transcriptSource'] = $transcriptSource;
        $self['transcriptUtterances'] = $transcriptUtterances;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEngagementID(int $engagementID): self
    {
        $self = clone $this;
        $self['engagementID'] = $engagementID;

        return $self;
    }

    /**
     * @param TranscriptSource|value-of<TranscriptSource> $transcriptSource
     */
    public function withTranscriptSource(
        TranscriptSource|string $transcriptSource
    ): self {
        $self = clone $this;
        $self['transcriptSource'] = $transcriptSource;

        return $self;
    }

    /**
     * @param list<TranscriptUtterance|TranscriptUtteranceShape> $transcriptUtterances
     */
    public function withTranscriptUtterances(array $transcriptUtterances): self
    {
        $self = clone $this;
        $self['transcriptUtterances'] = $transcriptUtterances;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
