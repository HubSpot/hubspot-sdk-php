<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;

/**
 * @phpstan-import-type ErrorDetailShape from \HubspotSDK\ErrorDetail
 *
 * @phpstan-type APIErrorShape = array{
 *   category: string,
 *   correlationID: string,
 *   message: string,
 *   context?: array<string,list<string>>|null,
 *   errors?: list<ErrorDetailShape>|null,
 *   links?: array<string,string>|null,
 *   subCategory?: string|null,
 * }
 */
final class APIError implements BaseModel
{
    /** @use SdkModel<APIErrorShape> */
    use SdkModel;

    /**
     * The error category.
     */
    #[Required]
    public string $category;

    /**
     * A unique identifier for the request. Include this value with any error reports or support tickets.
     */
    #[Required('correlationId')]
    public string $correlationID;

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    #[Required]
    public string $message;

    /**
     * Context about the error condition.
     *
     * @var array<string,list<string>>|null $context
     */
    #[Optional(map: new ListOf('string'))]
    public ?array $context;

    /**
     * further information about the error.
     *
     * @var list<ErrorDetail>|null $errors
     */
    #[Optional(list: ErrorDetail::class)]
    public ?array $errors;

    /**
     * A map of link names to associated URIs containing documentation about the error or recommended remediation steps.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * A specific category that contains more specific detail about the error.
     */
    #[Optional]
    public ?string $subCategory;

    /**
     * `new APIError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIError::with(category: ..., correlationID: ..., message: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIError)->withCategory(...)->withCorrelationID(...)->withMessage(...)
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
     * @param array<string,list<string>>|null $context
     * @param list<ErrorDetailShape>|null $errors
     * @param array<string,string>|null $links
     */
    public static function with(
        string $category,
        string $correlationID,
        string $message,
        ?array $context = null,
        ?array $errors = null,
        ?array $links = null,
        ?string $subCategory = null,
    ): self {
        $self = new self;

        $self['category'] = $category;
        $self['correlationID'] = $correlationID;
        $self['message'] = $message;

        null !== $context && $self['context'] = $context;
        null !== $errors && $self['errors'] = $errors;
        null !== $links && $self['links'] = $links;
        null !== $subCategory && $self['subCategory'] = $subCategory;

        return $self;
    }

    /**
     * The error category.
     */
    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * A unique identifier for the request. Include this value with any error reports or support tickets.
     */
    public function withCorrelationID(string $correlationID): self
    {
        $self = clone $this;
        $self['correlationID'] = $correlationID;

        return $self;
    }

    /**
     * A human readable message describing the error along with remediation steps where appropriate.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Context about the error condition.
     *
     * @param array<string,list<string>> $context
     */
    public function withContext(array $context): self
    {
        $self = clone $this;
        $self['context'] = $context;

        return $self;
    }

    /**
     * further information about the error.
     *
     * @param list<ErrorDetailShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * A map of link names to associated URIs containing documentation about the error or recommended remediation steps.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    /**
     * A specific category that contains more specific detail about the error.
     */
    public function withSubCategory(string $subCategory): self
    {
        $self = clone $this;
        $self['subCategory'] = $subCategory;

        return $self;
    }
}
