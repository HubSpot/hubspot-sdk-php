<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\ErrorDetail;

/**
 * @phpstan-type standard_error1 = array{
 *   category: string,
 *   context: array<string, list<string>>,
 *   errors: list<ErrorDetail>,
 *   links: array<string, string>,
 *   message: string,
 *   status: string,
 *   id?: string,
 *   subCategory?: mixed,
 * }
 */
final class StandardError1 implements BaseModel
{
    /** @use SdkModel<standard_error1> */
    use SdkModel;

    #[Api]
    public string $category;

    /** @var array<string, list<string>> $context */
    #[Api(map: new ListOf('string'))]
    public array $context;

    /** @var list<ErrorDetail> $errors */
    #[Api(list: ErrorDetail::class)]
    public array $errors;

    /** @var array<string, string> $links */
    #[Api(map: 'string')]
    public array $links;

    #[Api]
    public string $message;

    #[Api]
    public string $status;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public mixed $subCategory;

    /**
     * `new StandardError1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StandardError1::with(
     *   category: ...,
     *   context: ...,
     *   errors: ...,
     *   links: ...,
     *   message: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StandardError1)
     *   ->withCategory(...)
     *   ->withContext(...)
     *   ->withErrors(...)
     *   ->withLinks(...)
     *   ->withMessage(...)
     *   ->withStatus(...)
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
     * @param array<string, list<string>> $context
     * @param list<ErrorDetail> $errors
     * @param array<string, string> $links
     */
    public static function with(
        string $category,
        array $context,
        array $errors,
        array $links,
        string $message,
        string $status,
        ?string $id = null,
        mixed $subCategory = null,
    ): self {
        $obj = new self;

        $obj->category = $category;
        $obj->context = $context;
        $obj->errors = $errors;
        $obj->links = $links;
        $obj->message = $message;
        $obj->status = $status;

        null !== $id && $obj->id = $id;
        null !== $subCategory && $obj->subCategory = $subCategory;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    /**
     * @param array<string, list<string>> $context
     */
    public function withContext(array $context): self
    {
        $obj = clone $this;
        $obj->context = $context;

        return $obj;
    }

    /**
     * @param list<ErrorDetail> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withSubCategory(mixed $subCategory): self
    {
        $obj = clone $this;
        $obj->subCategory = $subCategory;

        return $obj;
    }
}
