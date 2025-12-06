<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Transcripts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TranscriptCreateResponseShape = array{id: string}
 */
final class TranscriptCreateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TranscriptCreateResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
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
        $obj = new self;

        $obj['id'] = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }
}
