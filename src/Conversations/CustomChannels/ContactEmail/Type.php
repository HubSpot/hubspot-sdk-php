<?php

declare(strict_types=1);

namespace HubSpotSDK\Conversations\CustomChannels\ContactEmail;

enum Type: string
{
    case HOME = 'HOME';

    case WORK = 'WORK';
}
