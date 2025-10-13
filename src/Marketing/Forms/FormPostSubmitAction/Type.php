<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FormPostSubmitAction;

/**
 * The action to take after submit. The default action is displaying a thank you message.
 */
enum Type: string
{
    case THANK_YOU = 'thank_you';

    case REDIRECT_URL = 'redirect_url';
}
