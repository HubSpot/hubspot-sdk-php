<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\MarketingFormsFormPostSubmitAction;

enum Type: string
{
    case THANK_YOU = 'thank_you';

    case REDIRECT_URL = 'redirect_url';
}
