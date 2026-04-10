<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling\Transcripts;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptCreateResponseShape = array{id: string}
 */
final class TranscriptCreateResponse implements BaseModel
{
    /** @use SdkModel<TranscriptCreateResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * `new TranscriptCreateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TranscriptCreateResponse::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TranscriptCreateResponse)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
