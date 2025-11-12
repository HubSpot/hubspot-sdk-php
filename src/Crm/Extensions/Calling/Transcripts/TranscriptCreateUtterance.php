<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptCreateUtteranceShape = array{
 *   endTimeMillis: int,
 *   speaker: Speaker,
 *   startTimeMillis: int,
 *   text: string,
 *   languageCode?: string|null,
 * }
 */
final class TranscriptCreateUtterance implements BaseModel
{
    /** @use SdkModel<TranscriptCreateUtteranceShape> */
    use SdkModel;

    #[Api]
    public int $endTimeMillis;

    #[Api]
    public Speaker $speaker;

    #[Api]
    public int $startTimeMillis;

    #[Api]
    public string $text;

    #[Api(optional: true)]
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
     */
    public static function with(
        int $endTimeMillis,
        Speaker $speaker,
        int $startTimeMillis,
        string $text,
        ?string $languageCode = null,
    ): self {
        $obj = new self;

        $obj->endTimeMillis = $endTimeMillis;
        $obj->speaker = $speaker;
        $obj->startTimeMillis = $startTimeMillis;
        $obj->text = $text;

        null !== $languageCode && $obj->languageCode = $languageCode;

        return $obj;
    }

    public function withEndTimeMillis(int $endTimeMillis): self
    {
        $obj = clone $this;
        $obj->endTimeMillis = $endTimeMillis;

        return $obj;
    }

    public function withSpeaker(Speaker $speaker): self
    {
        $obj = clone $this;
        $obj->speaker = $speaker;

        return $obj;
    }

    public function withStartTimeMillis(int $startTimeMillis): self
    {
        $obj = clone $this;
        $obj->startTimeMillis = $startTimeMillis;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    public function withLanguageCode(string $languageCode): self
    {
        $obj = clone $this;
        $obj->languageCode = $languageCode;

        return $obj;
    }
}
