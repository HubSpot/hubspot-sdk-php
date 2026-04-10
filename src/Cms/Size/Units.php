<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Size;

enum Units: string
{
    case PERCENT = '%';

    case CH = 'ch';

    case CM = 'cm';

    case EM = 'em';

    case EX = 'ex';

    case IN = 'in';

    case LH = 'lh';

    case MM = 'mm';

    case PC = 'pc';

    case PT = 'pt';

    case PX = 'px';

    case Q = 'Q';

    case REM = 'rem';

    case VH = 'vh';

    case VMAX = 'vmax';

    case VMIN = 'vmin';

    case VW = 'vw';
}
