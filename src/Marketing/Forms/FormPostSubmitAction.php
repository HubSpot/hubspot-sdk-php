<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FormPostSubmitAction\Type;

/**
 * What should happen after the customer submits the form.
 *
 * @phpstan-type FormPostSubmitActionShape = array{
 *   type: value-of<Type>, value: string
 * }
 */
final class FormPostSubmitAction implements BaseModel
{
    /** @use SdkModel<FormPostSubmitActionShape> */
    use SdkModel;

    /**
     * The action to take after submit. The default action is displaying a thank you message.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The thank you text or the page to redirect to.
     */
    #[Required]
    public string $value;

    /**
     * `new FormPostSubmitAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FormPostSubmitAction::with(type: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FormPostSubmitAction)->withType(...)->withValue(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(Type|string $type, string $value): self
    {
        $self = new self;

        $self['type'] = $type;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The action to take after submit. The default action is displaying a thank you message.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The thank you text or the page to redirect to.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
