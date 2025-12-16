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
 * @phpstan-type TranscriptCreateUtteranceShape = array{
 *   endTimeMillis: int,
 *   speaker: Speaker|SpeakerShape,
 *   startTimeMillis: int,
 *   text: string,
 *   languageCode?: string|null,
 * }
 */
final class TranscriptCreateUtterance implements BaseModel
{
    /** @use SdkModel<TranscriptCreateUtteranceShape> */
    use SdkModel;

    #[Required]
    public int $endTimeMillis;

    #[Required]
    public Speaker $speaker;

    #[Required]
    public int $startTimeMillis;

    #[Required]
    public string $text;

    #[Optional]
    public ?string $languageCode;

    /**
     * `new TranscriptCreateUtterance()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptCreateUtterance::with(
     *   endTimeMillis: ..., speaker: ..., startTimeMillis: ..., text: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TranscriptCreateUtterance)
     *   ->withEndTimeMillis(...)
     *   ->withSpeaker(...)
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
     * @param SpeakerShape $speaker
     */
    public static function with(
        int $endTimeMillis,
        Speaker|array $speaker,
        int $startTimeMillis,
        string $text,
        ?string $languageCode = null,
    ): self {
        $self = new self;

        $self['endTimeMillis'] = $endTimeMillis;
        $self['speaker'] = $speaker;
        $self['startTimeMillis'] = $startTimeMillis;
        $self['text'] = $text;

        null !== $languageCode && $self['languageCode'] = $languageCode;

        return $self;
    }

    public function withEndTimeMillis(int $endTimeMillis): self
    {
        $self = clone $this;
        $self['endTimeMillis'] = $endTimeMillis;

        return $self;
    }

    /**
     * @param SpeakerShape $speaker
     */
    public function withSpeaker(Speaker|array $speaker): self
    {
        $self = clone $this;
        $self['speaker'] = $speaker;

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
}
