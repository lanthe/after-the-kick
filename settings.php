<?php

function site_name() {
    switch ($_SERVER["SERVER_NAME"]) {
	    case "indiewentwent.com":
			return "Indie Went Went";
		case "afterthekick.com":
			return "After the Kick";
		case "kickfollower.com":
				return "Kick Follower";
		case "localhost":
		default:
			return "After the Kick";
	}
}
?>