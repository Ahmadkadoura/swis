<?php

namespace App\Enums;

enum transType :  int
{
    case WASH = 1;
    case NFIs_Shelters = 2;
    case COMPLETEDFood_Agriculture = 3;
    case Health = 4;
    case Nutrition = 5;

    case Protection = 6;
}
