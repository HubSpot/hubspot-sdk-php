<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SpeakerShape from \HubspotSDK\Crm\Extensions\Calling\Transcripts\Speaker
 *
 * @phpstan-type TranscriptUtteranceShape = array{
 *   id: string,
 *   endTimeMillis: int,
 *   startTimeMillis: int,
 *   text: string,
 *   languageCode?: string|null,
 *   speaker?: null|Speaker|SpeakerShape,
 * }
 */
final class TranscriptUtterance implements BaseModel
{
    /** @use SdkModel<TranscriptUtteranceShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public int $endTimeMillis;

    #[Required]
    public int $startTimeMillis;

    #[Required]
    public string $text;

    #[Optional]
    public ?string $languageCode;

    #[Optional]
    public ?Speaker $speaker;

    /**
     * `new TranscriptUtterance()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptUtterance::with(
     *   id: ..., endTimeMillis: ..., startTimeMillis: ..., text: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TranscriptUtterance)
     *   ->withID(...)
     *   ->withEndTimeMillis(...)
     *   ->withStartTimeMillis(...)
     *   ->withText(...)
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
     * @param Speaker|SpeakerShape|null $speaker
     */
    public static function with(
        string $id,
        int $endTimeMillis,
        int $startTimeMillis,
        string $text,
        ?string $languageCode = null,
        Speaker|array|null $speaker = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['endTimeMillis'] = $endTimeMillis;
        $self['startTimeMillis'] = $startTimeMillis;
        $self['text'] = $text;

        null !== $languageCode && $self['languageCode'] = $languageCode;
        null !== $speaker && $self['speaker'] = $speaker;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEndTimeMillis(int $endTimeMillis): self
    {
        $self = clone $this;
        $self['endTimeMillis'] = $endTimeMillis;

        return $self;
    }

    public function withStartTimeMillis(int $startTimeMillis): self
    {
        $self = clone $this;
        $self['startTimeMillis'] = $startTimeMillis;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withLanguageCode(string $languageCode): self
    {
        $self = clone $this;
        $self['languageCode'] = $languageCode;

        return $self;
    }

    /**
     * @param Speaker|SpeakerShape $speaker
     */
    public function withSpeaker(Speaker|array $speaker): self
    {
        $self = clone $this;
        $self['speaker'] = $speaker;

        return $self;
    }
}
