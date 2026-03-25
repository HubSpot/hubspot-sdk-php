<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels\QuickReply;

enum ValueType: string
{
    case TEXT = 'TEXT';

    case URL = 'URL';
}
