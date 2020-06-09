<?php
function generateRand($string)
{
switch ($string) {
	case 'Unity ':
		$randNum=1;
		break;
		case 'Unreal ':
		$randNum=2;
		break;
		case 'PHP ':
		$randNum=3;
		break;
		case 'Art ':
		$randNum=4;
		break;
		case 'General ':
		$randNum=5;
		break;
	default:
		$randNum=5;
		break;
}

    switch ($randNum) {
      case '1':
        $randColor = "text-success";
        break;
      case '2':
        $randColor = "text-danger";
        break;
        case '3':
        $randColor = "text-warning";
        break;
        case '4':
        $randColor = "text-info";
        break;
        case '5':
        $randColor = "text-primary";
        break;
      default:
        $randColor = "text-success";
        break;
  }
  return $randColor;
    }
?>