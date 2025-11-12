<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptUtteranceShape = array{
 *   id: string,
 *   endTimeMillis: int,
 *   startTimeMillis: int,
 *   text: string,
 *   languageCode?: string|null,
 *   speaker?: Speaker|null,
 * }
 */
final class TranscriptUtterance implements BaseModel
{
    /** @use SdkModel<TranscriptUtteranceShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public int $endTimeMillis;

    #[Api]
    public int $startTimeMillis;

    #[Api]
    public string $text;

    #[Api(optional: true)]
    public ?string $languageCode;

    #[Api(optional: true)]
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
     */
    public static function with(
        string $id,
        int $endTimeMillis,
        int $startTimeMillis,
        string $text,
        ?string $languageCode = null,
        ?Speaker $speaker = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->endTimeMillis = $endTimeMillis;
        $obj->startTimeMillis = $startTimeMillis;
        $obj->text = $text;

        null !== $languageCode && $obj->languageCode = $languageCode;
        null !== $speaker && $obj->speaker = $speaker;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withEndTimeMillis(int $endTimeMillis): self
    {
        $obj = clone $this;
        $obj->endTimeMillis = $endTimeMillis;

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

    public function withSpeaker(Speaker $speaker): self
    {
        $obj = clone $this;
        $obj->speaker = $speaker;

        return $obj;
    }
}
